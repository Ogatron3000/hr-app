<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\JobStatus;
use Database\Factories\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEmployeesTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_manage_employees(): void
    {
        $employee = Employee::factory()->create();

        $this->get(route('employees.index'))->assertRedirect('/login');
        $this->get($employee->path())->assertRedirect('/login');
        $this->get(route('employees.create'))->assertRedirect('/login');
        $this->post(route('employees.store'), Employee::factory()->raw())->assertRedirect('/login');
        $this->get($employee->path() . '/edit')->assertRedirect('/login');
        $this->patch($employee->path(), Employee::factory()->raw())->assertRedirect('/login');
        $this->delete($employee->path())->assertRedirect('/login');
    }

    public function test_user_can_see_employees(): void
    {
        $this->signIn();

        $employee = Employee::factory()->create();

        $this->get(route('employees.index'))
            ->assertOk()
            ->assertSee($employee->name);
    }

    public function test_user_can_view_employee_details(): void
    {
        $this->signIn();

        $employee = Employee::factory()->create();
        $employee->addStatus(JobStatus::factory()->raw(['employee_id' => '']));

        $this->get($employee->path())
            ->assertOk()
            ->assertSee($employee->name)
            ->assertSee($employee->birthdate)
            ->assertSee($employee->national_id)
            ->assertSee($employee->address)
            ->assertSee($employee->email)
            ->assertSee($employee->phone)
            ->assertSee($employee->office)
            ->assertSee($employee->status()->date)
            ->assertSee($employee->status()->wage)
            ->assertSee($employee->status()->bank->name)
            ->assertSee($employee->status()->bank_account);
    }

    public function test_user_can_add_employee(): void
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->get(route('employees.create'))->assertOk();

        $employee = array_merge(Employee::factory()->raw(), JobStatus::factory()->raw(['employee_id' => '']));

        $this->followingRedirects()
            ->post(route('employees.store'), $employee)
            ->assertSee($employee['name'])
            ->assertSee($employee['birthdate'])
            ->assertSee($employee['joined'])
            ->assertSee($employee['wage']);

        $this->assertNotNull(Employee::find(1));
        $this->assertNotNull(Employee::find(1)->status());
    }

    public function test_user_can_update_employee(): void
    {
        $this->signIn();

        $employee = Employee::factory()->create();
        $employee->addStatus(JobStatus::factory()->raw(['employee_id' => '']));

        $this->get($employee->path() . '/edit')->assertOk();

        $updated = array_merge(Employee::factory()->raw(), JobStatus::factory()->raw(['employee_id' => '']));

        $this->followingRedirects()
            ->patch($employee->path(), $updated)
            ->assertSee($updated['name'])
            ->assertSee($updated['wage']);

        $this->assertNotNull(Employee::find($employee->id));
        $this->assertNotNull(Employee::find($employee->id)->status());
    }

    public function test_user_can_delete_employee(): void
    {
        $this->signIn();

        $employee = Employee::factory()->create();
        $employee->addStatus($status = JobStatus::factory()->raw(['employee_id' => '']));

        $this->followingRedirects()
            ->delete($employee->path())
            ->assertDontSee($employee->name)
            ->assertDontSee($employee->wage);

        $this->assertDatabaseCount('employees', 0);
        $this->assertDatabaseCount('job_statuses', 0);
    }
}
