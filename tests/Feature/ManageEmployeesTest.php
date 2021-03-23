<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\EmployeeStatus;
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
        $employee = Employee::factory()->create();

        $this->signIn();

        $this->get(route('employees.index'))
            ->assertOk()
            ->assertSee($employee->name);
            // ->assertSee($employee->birthdate)
            // ->assertSee($employee->address)
            // ->assertSee($employee->phone);
    }

    public function test_user_can_view_employee_details(): void
    {
        $employee = Employee::factory()->create();
        $status = EmployeeStatus::factory()->create(['employee_id' => $employee->id]);
        $employee->addStatus($status->id);

        $this->signIn();

        $this->get($employee->path())
            ->assertOk()
            ->assertSee($employee->name)
            ->assertSee($employee->birthdate)
            ->assertSee($employee->national_id)
            ->assertSee($employee->address)
            ->assertSee($employee->email)
            ->assertSee($employee->phone)
            ->assertSee($employee->office);
    }

    public function test_user_can_add_employee(): void
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->get(route('employees.create'))->assertOk();

        $employee = ['employeeInfo'   => Employee::factory()->raw(),
                     'employeeStatus' => EmployeeStatus::factory()->raw(['employee_id' => '']),
        ];

        $this->followingRedirects()
            ->post(route('employees.store'), $employee)
            ->assertSee($employee['employeeInfo']['name'])
            ->assertSee($employee['employeeInfo']['birthdate'])
            ->assertSee($employee['employeeInfo']['national_id'])
            ->assertSee($employee['employeeStatus']['joined'])
            ->assertSee($employee['employeeStatus']['wage']);

        $this->assertDatabaseHas('employees', $employee['employeeInfo']);
        $this->assertNotNull(Employee::find(1)->status());
    }

    public function test_user_can_update_employee(): void
    {
        $employee = Employee::factory()->create();

        $this->signIn();

        $this->get($employee->path())->assertSee($employee->name);

        $this->get($employee->path() . '/edit')->assertOk();

        $this->followingRedirects()
            ->patch($employee->path(), $updated = Employee::factory()->raw())
            ->assertSee($updated['name']);

        $this->assertDatabaseHas('employees', $updated);
    }

    public function test_user_can_delete_employee(): void
    {
        $employee = Employee::factory()->create();

        $this->signIn();

        $this->followingRedirects()
            ->delete($employee->path())
            ->assertDontSee($employee->name);
    }
}
