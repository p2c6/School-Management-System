<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $course = Course::all()->random()->id;
        return [
            'full_name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'gender' => $gender,
            'course_id' => $course
        ];
    }
}
