<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Provider\uk_UA\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['active', 'disable'];
        return [
            'user_id' => User::factory(),
            'address' => fake()->address,
            'status' => $statuses[rand(0,1)],
            'tariff' => 'Unlim 1000',
            'balance' => rand(-100, 2000),
        ];
    }
}
