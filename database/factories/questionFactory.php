<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\question>
 */
class questionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_uuid' => User::inRandomOrder()->first()->uuid,  // جلب UUID عشوائي من اليوزرات الموجودين
            'question_title' => $this->faker->sentence,
            'question_content' => $this->faker->paragraph,
            'question_city' => $this->faker->city,
            'question_status' => $this->faker->randomElement(['open', 'closed', 'pending']),
            'case_specialization' => $this->faker->word,
            'question_time' => $this->faker->optional()->time,
            'contact_method' => $this->faker->optional()->phoneNumber,
        ];
    }
}
