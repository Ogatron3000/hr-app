<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\EmployeeStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_path(): void
    {
        $employee = Employee::factory()->create();

        $this->assertEquals('/employees/' . $employee->id, $employee->path());
    }

    public function test_it_belongs_to_many_employment_statuses(): void
    {
        $employee = Employee::factory()->create();
        $status = EmployeeStatus::factory()->create();

        $employee->statusHistory()->attach($status->id);

        $this->assertInstanceOf(EmployeeStatus::class, $employee->statusHistory[0]);
        $this->assertInstanceOf(EmployeeStatus::class, $employee->status());
    }

    public function test_it_can_add_employee_status()
    {
        $employee = Employee::factory()->create();

        $statusOne = $employee->addStatus(EmployeeStatus::factory()->raw());
        $this->assertEquals($statusOne->id, $employee->status()->id);

        $statusTwo = $employee->addStatus(EmployeeStatus::factory()->raw());
        $this->assertEquals($statusTwo->id, $employee->status()->id);
    }
}
