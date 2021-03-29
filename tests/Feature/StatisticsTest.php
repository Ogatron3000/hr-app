<?php

namespace Tests\Feature;

use App\Models\ActiveStatus;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    use RefreshDatabase;

    // test failing because of SQLite and MySQL differences - no TIMEDIFF and NOW() in SQLite
    // public function test_user_can_see_employees_statistics()
    // {
    //     $this->withoutExceptionHandling();
    //     $this->signIn();
    //
    //     EmployeeFactory::create(10);
    //
    //     $this->get(route('statistics.index'))
    //         ->assertOk()
    //         ->assertSee('Total number of employees: 10');
    // }

    public function test_chart_api_returns_json_data()
    {
        $this->signIn();

        $employees = Employee::factory(9)->create();
        $departments = Department::factory(3)->create();
        $activeStatuses = ActiveStatus::factory(3)->create();
        $contractTypes = ContractType::factory(3)->create();

        foreach ($employees as $employee) {
            JobDescription::factory()->create(
                [
                    'employee_id'   => $employee->id,
                    'department_id' => $departments[fmod($employee->id - 1, 3)]->id,
                ]
            );
            JobStatus::factory()->create(
                [
                    'employee_id'      => $employee->id,
                    'active_status_id' => $activeStatuses[fmod($employee->id - 1, 3)]->id,
                    'contract_type_id' => $contractTypes[fmod($employee->id - 1, 3)]->id,
                ]
            );
        }

        $departmentData = Department::select('name')->withCount('jobDescriptions')->get()->toArray();
        $activeStatusData = ActiveStatus::select('name')->withCount('jobStatuses')->get()->toArray();
        $contractTypeData = ContractType::select('name')->withCount('jobStatuses')->get()->toArray();

        $this->get('/api/statistics')->assertJson([$departmentData, $activeStatusData, $contractTypeData]);
    }

}
