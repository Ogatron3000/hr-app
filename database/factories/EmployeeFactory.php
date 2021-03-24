<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'avatar' => UploadedFile::fake()->image('old_avatar.jpg'),
            'birthdate' => $this->faker->date(),
            'national_id' => '1234567890123',
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'office' => 'main office',
            'notes' => $this->faker->text
        ];
    }
}
