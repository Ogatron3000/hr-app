<?php

namespace Database\Factories;

use App\Models\ActiveStatus;
use App\Models\ContractType;
use App\Models\JobStatus;
use App\Models\Bank;use App\Models\Employee;use Illuminate\Database\Eloquent\Factories\Factory;

class JobStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'contract_type_id' => ContractType::factory(),
            'active_status_id' => ActiveStatus::factory(),
            'joined' => $this->faker->date(),
            'wage' => 1500.00,
            'bank_id' => Bank::factory(),
            'bank_account' => $this->faker->bankAccountNumber,
        ];
    }
}
