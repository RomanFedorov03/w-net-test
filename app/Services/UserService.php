<?php
namespace App\Services;

use App\Models\Address;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create_user($request)
    {
        return User::factory()->has(
            Address::factory()->has(
                Service::factory()->count(1), 'services'
            )->count(3), 'addresses'
        )->create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
    }
}
