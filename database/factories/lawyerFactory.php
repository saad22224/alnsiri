<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lawyer>
 */
class lawyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'city' => $this->faker->city,
            'password' => bcrypt('password'), // Use bcrypt for passwords
            'repeat_password' => bcrypt('password'), // Same as password
            'otp' => $this->faker->numerify('######'), // Generate a 6-digit OTP
            'status' => $this->faker->randomElement([0, 1]), // Random status (0 or 1)
            'phone_number' => $this->faker->unique()->phoneNumber,
            'experience' => $this->faker->numberBetween(1, 20), // Random years of experience
            'last_activity' => $this->faker->dateTimeThisYear, // Random datetime this year
            'remember_token' => Str::random(10),
        ];
    }
}
