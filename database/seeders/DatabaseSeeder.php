<?php

namespace Database\Seeders;

use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
use App\Models\Employee;
use App\Models\EmployeeStatus;
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

        EmployeeStatus::factory(20)->create();
    }
}
