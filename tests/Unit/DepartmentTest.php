<?php

namespace Tests\Unit;

use App\Models\Department;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;
use Carbon\Carbon;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_many_employees(): void
    {
        $department = Department::factory()->create();

        JobDescription::factory()->create(['department_id' => $department->id]);

        $this->assertInstanceOf(JobDescription::class, $department->jobDescriptions[0]);
    }
}
