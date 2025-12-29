<?php

namespace App\Http\Controllers\Api\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!$request->validated()) return apiResponse(422, 'validation error');
        $data = $request->validated();

        // if (RateLimiter::tooManyAttempts($request->ip(), 3)) {
        //     $time = RateLimiter::availableIn($request->ip());
        //     return apiResponse(429, 'Too Many Attempts. Please try again in ' . $time . ' seconds.');
        // }
        // RateLimiter::increment($request->ip());
        // $remaing = RateLimiter::remaining($request->ip(), 3);

        $user = User::whereEmail($data['email'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            $token = $user->createToken('auth_token', [], now()->addDay())->plainTextToken;
            return apiResponse(200, 'Login Successfully', ['token' => $token]);
        }

        return apiResponse(401, 'Invalid Credentials');

    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return apiResponse(200, 'Logout Successfully');
    }
}
