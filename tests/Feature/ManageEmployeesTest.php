<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEmployeesTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_manage_employees()
    {

    }

    public function test_authenticated_user_can_see_employees()
    {
        $this->withoutExceptionHandling();

        $employee = Employee::factory()->create();

        $this->signIn();

        $this->get(route('employees.index'))->assertOk()
            ->assertSee($employee->name)
            ->assertSee($employee->birthdate)
            ->assertSee($employee->address)
            ->assertSee($employee->phone);
    }
}
