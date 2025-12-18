<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'course_ref' => strtoupper($this->faker->regexify('[A-Z]{3}[0-9]{3}')),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'credits' => $this->faker->numberBetween(1, 6),
            'instructor' => $this->faker->name(),
        ];
    }
}
