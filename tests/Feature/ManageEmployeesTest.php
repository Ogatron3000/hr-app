<?php

namespace Tests\Feature;

use App\Models\Employee;
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

        $this->followingRedirects()
            ->post(route('employees.store'), $employee = Employee::factory()->raw())
            ->assertSee($employee['name'])
            ->assertSee($employee['birthdate'])
            ->assertSee($employee['national_id']);

        $this->assertDatabaseHas('employees', $employee);
    }
}
