<?php

namespace Database\Seeders;

use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;
use App\Models\User;
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

        foreach ($employees as $employee) {
            $employee->addJobStatus(JobStatus::factory()->raw(['employee_id' => '']));
            $employee->addJobDescription(JobDescription::factory()->raw(['employee_id' => '']));
        }
    }
}
