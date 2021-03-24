<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\JobStatus;
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

    public function test_it_has_many_employment_statuses(): void
    {
        $this->withoutExceptionHandling();
        $employee = Employee::factory()->create();
        JobStatus::factory()->create(['employee_id' => $employee->id]);

        $this->assertInstanceOf(JobStatus::class, $employee->jobStatusHistory[0]);
        $this->assertInstanceOf(JobStatus::class, $employee->jobStatus());
    }

    public function test_it_can_add_employee_status()
    {
        $employee = Employee::factory()->create();

        $statusOne = $employee->addJobStatus(JobStatus::factory()->raw());
        $this->assertEquals($statusOne->id, $employee->jobStatus()->id);

        $statusTwo = $employee->addJobStatus(JobStatus::factory()->raw());
        $this->assertEquals($statusTwo->id, $employee->jobStatus()->id);
    }
}
