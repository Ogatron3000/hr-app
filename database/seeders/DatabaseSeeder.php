<?php

namespace Database\Seeders;

use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
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
        // User::factory()->create(['email' => 'admin@admin.com']);
        //
        // $employees = EmployeeFactory::withJobStatus(3)->withJobDescription(3)->withDocument()->create(20);
        //
        // foreach ($employees as $employee) {
        //     $employee->addJobStatus(JobStatus::factory()->raw(['employee_id' => '']));
        //     $employee->addJobDescription(JobDescription::factory()->raw(['employee_id' => '']));
        // }
    }

}
