<?php

namespace Database\Seeders;

use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Document;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;
use App\Models\User;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'admin@admin.com']);

        $employees = Employee::factory(20)->create();
        $activeStatuses = [
            ActiveStatus::factory()->create(['name' => 'Active']),
            ActiveStatus::factory()->create(['name' => 'Vacation']),
            ActiveStatus::factory()->create(['name' => 'Sick']),
            ActiveStatus::factory()->create(['name' => 'Inactive']),
        ];
        $contractTypes = [
            ContractType::factory()->create(['name' => 'Full-time']),
            ContractType::factory()->create(['name' => 'Part-time']),
            ContractType::factory()->create(['name' => 'Seasonal']),
            ContractType::factory()->create(['name' => 'Internship']),
        ];
        $departments = [
            Department::factory()->create(['name' => 'Management']),
            Department::factory()->create(['name' => 'Development']),
            Department::factory()->create(['name' => 'HR']),
            Department::factory()->create(['name' => 'Marketing']),
        ];

        for ($i = 0; $i < $employees->count(); $i++) {

            $employees[$i]->addJobStatus(JobStatus::factory()->raw(
                [
                    'employee_id'      => null,
                    'active_status_id' => $activeStatuses[fmod($i, 4)]->id,
                    'contract_type_id' => $contractTypes[fmod($i, 4)]->id,
                ]
            ));

            $employees[$i]->addJobDescription(JobDescription::factory()->raw(
                [
                    'employee_id' => null,
                    'department_id' => $departments[fmod($i, 4)]->id,
                ]
            ));

            $employees[$i]->addDocument(Document::factory()->raw(['employee_id' => null]));
        }
    }

}
