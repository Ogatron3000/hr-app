<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\JobDescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobDescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobDescription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_name' => $this->faker->word,
            'employee_id' => Employee::factory(),
            'department_id' => Department::factory(),
            'description' => $this->faker->text,
            'skills' => $this->faker->text,
        ];
    }
}
