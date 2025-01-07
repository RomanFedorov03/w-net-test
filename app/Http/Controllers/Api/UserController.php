<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     *  Login
     *
     *  Даний метод використовується для створення нового клієнта.
     *
     * @group User
     *
     * @param Request $request
     * @return UserResource
     * @throws ValidationException
     * @bodyParam email string required User email. Example: user@user.com
     * @bodyParam password string User password
     * @response {
     *      "data": {
     *      "username": "test",
     *      "phone": "0972142310",
     *      "email": "test7@test.ua",
     *      "language": "uk",
     *      "theme": "light",
     *      "deviceId": null,
     *      "addresses": [
     *           {
     *                "address": "16943, Полтавська область, місто Полтава, просп. Урицького, 12",
     *                "status": "disable",
     *                "tariff": "Unlim 1000",
     *                "balance": "1274",
     *                "services": {
     *                     "internet": "Unlim 1000",
     *                     "tv": "omega 60",
     *                     "ip": "10.10.10.10"
     *                }
     *           }
     *      ]
     * },
     * "token": "14|qe4ditLS1QViqtpyDJiE7wWe6Gx28Cd6yvRWXSdU80b2a822"
     * }
     */
    public function login(Request $request): UserResource
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::query()->where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $user->tokens()->delete();

        return UserResource::make($user)->additional([
            'token' => $user->createToken('bearer-token')->plainTextToken,
        ]);
    }

    /**
     *  User info
     *
     * Даний метод використовується для створення нового клієнта.
     * @authenticated
     *
     * @group User
     *
     * @param Request $request
     * @return UserResource
     * @header Authorization Bearer 15|WWIUnECvdhznR2mygR0iUUJCDT90QzzwjGuImC9f7780bb1f
     * @response {
     *      "data": {
     *      "username": "test",
     *      "phone": "0972142310",
     *      "email": "test7@test.ua",
     *      "language": "uk",
     *      "theme": "light",
     *      "deviceId": null,
     *      "addresses": [
     *           {
     *                "address": "16943, Полтавська область, місто Полтава, просп. Урицького, 12",
     *                "status": "disable",
     *                "tariff": "Unlim 1000",
     *                "balance": "1274",
     *                "services": {
     *                     "internet": "Unlim 1000",
     *                     "tv": "omega 60",
     *                     "ip": "10.10.10.10"
     *                }
     *           }
     *      ]
     * }
     * }
     */
    public function user_info(Request $request): UserResource
    {
        return UserResource::make($request->user());
    }

    /**
     *  Create User
     *
     *  Даний метод використовується для створення нового клієнта.
     *
     * @group User
     *
     * @param CreateUserRequest $request
     * @return UserResource
     * @bodyParam name string required User name. Example: username
     * @bodyParam email string required User email. Example: user@user.com
     * @bodyParam password string User password
     * @response {
     *      "data": {
     *      "username": "test",
     *      "phone": "0972142310",
     *      "email": "test7@test.ua",
     *      "language": "uk",
     *      "theme": "light",
     *      "deviceId": null,
     *      "addresses": [
     *           {
     *                "address": "16943, Полтавська область, місто Полтава, просп. Урицького, 12",
     *                "status": "disable",
     *                "tariff": "Unlim 1000",
     *                "balance": "1274",
     *                "services": {
     *                     "internet": "Unlim 1000",
     *                     "tv": "omega 60",
     *                     "ip": "10.10.10.10"
     *                }
     *           }
     *      ]
     * },
     * "token": "14|qe4ditLS1QViqtpyDJiE7wWe6Gx28Cd6yvRWXSdU80b2a822"
     * }
     */
    public function create_user(CreateUserRequest $request): UserResource
    {
        $user = (new UserService())->create_user($request);

        return UserResource::make($user)->additional([
            'token' => $user->createToken('bearer-token')->plainTextToken,
        ]);
    }
}
