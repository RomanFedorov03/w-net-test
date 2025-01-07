<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->has(
            Address::factory()->has(
                Service::factory()->count(1), 'services'
            )->count(3), 'addresses'
        )->create();
    }
}
