<?php

namespace Database\Factories;

use App\Models\EmployeeStatus;
use App\Models\Bank;use App\Models\Employee;use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            // $table->foreignId('employment_type_id')->constrained();
            // $table->foreignId('employment_status_id')->constrained();
            'joined' => $this->faker->date(),
            'wage' => 1500.00,
            'bank_id' => Bank::factory(),
            'bank_account' => $this->faker->bankAccountNumber,
        ];
    }
}
