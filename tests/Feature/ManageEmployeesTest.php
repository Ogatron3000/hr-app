<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Facades\Tests\Setup\EmployeeFactory;
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
        $this->withoutExceptionHandling();
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->create();

        $this->get(route('employees.index'))
            ->assertOk()
            ->assertSee($employee->name);
    }

    public function test_user_can_search_employees()
    {
        $this->signIn();

        $employees = EmployeeFactory::withJobStatus()->withJobDescription()->create(3);

        $this->get(route('employees.index', ['name' => $employees[0]->name]))
            ->assertSee($employees[0]->name)
            ->assertDontSee($employees[1]->name)
            ->assertDontSee($employees[2]->name);
    }

    public function test_user_can_view_employee_details(): void
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->create();

        $this->get($employee->path())
            ->assertOk()
            ->assertSee($employee->name)
            ->assertSee($employee->birthdate)
            ->assertSee($employee->national_id)
            ->assertSee($employee->address)
            ->assertSee($employee->email)
            ->assertSee($employee->phone)
            ->assertSee($employee->cellphone)
            ->assertSee($employee->office)
            ->assertSee($employee->jobStatus->date)
            ->assertSee($employee->jobStatus->wage)
            ->assertSee($employee->jobStatus->bank->name)
            ->assertSee($employee->jobStatus->bank_account)
            ->assertSee($employee->jobDescription->job_name)
            ->assertSee($employee->jobDescription->department->name)
            ->assertSee($employee->jobDescription->description)
            ->assertSee($employee->jobDescription->skills);
    }

    public function test_user_can_add_employee(): void
    {
        $this->signIn();

        $employee = array_merge(
            Employee::factory()->raw(),
            JobStatus::factory()->raw(['employee_id' => '']),
            JobDescription::factory()->raw(['employee_id' => '', 'avatar' => UploadedFile::fake()->image('avatar.jpg')])
        );

        $this->get(route('employees.create'))->assertOk();

        $this->followingRedirects()
            ->post(route('employees.store'), $employee)
            ->assertSee($employee['name'])
            ->assertSee($employee['birthdate'])
            ->assertSee($employee['joined'])
            ->assertSee($employee['wage'])
            ->assertSee($employee['job_name'])
            ->assertSee($employee['description']);

        $this->assertNotNull(Employee::find(1));
        $this->assertNotNull(Employee::find(1)->jobStatus);
        $this->assertNotNull(Employee::find(1)->jobDescription);
        // Done with s3 bucket
        // Storage::disk('local')->assertExists('avatars/' . $employee['avatar']->hashName());
    }

    public function test_user_can_update_employee(): void
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->create();

        $updated = array_merge(
            Employee::factory()->raw(),
            JobStatus::factory()->raw(['employee_id' => '']),
            JobDescription::factory()->raw(['employee_id' => '', 'avatar' => UploadedFile::fake()->image('avatar.jpg')])
        );

        $this->get($employee->path() . '/edit')->assertOk();

        $this->followingRedirects()
            ->patch($employee->path(), $updated)
            ->assertSee($updated['name'])
            ->assertSee($updated['wage'])
            ->assertSee($updated['job_name']);

        $this->assertEquals(1, JobStatus::count());
        $this->assertEquals(1, JobDescription::count());
        // Done with s3 bucket
        // Storage::disk('local')->assertExists('avatars/' . $updated['avatar']->hashName());
        // Storage::disk('local')->assertMissing('avatars/' . $employee['avatar']);
    }

    public function test_user_can_delete_employee(): void
    {
        $this->signIn();
        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->create();

        $this->followingRedirects()
            ->delete($employee->path())
            ->assertDontSee($employee->name)
            ->assertDontSee($employee->wage)
            ->assertDontSee($employee->job_name);

        $this->assertDatabaseCount('employees', 0);
        $this->assertDatabaseCount('job_statuses', 0);
        $this->assertDatabaseCount('job_descriptions', 0);
        // Done with s3 bucket
        // Storage::disk('local')->assertMissing('avatars/' . $employee->avatar);
    }
}
