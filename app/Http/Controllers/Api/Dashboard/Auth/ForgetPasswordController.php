<?php

namespace App\Http\Controllers\Api\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{

    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:30|min:5|exists:users,email',
        ]);

        $user = User::whereEmail($request->only('email'))->first();
        if (!$user) {
            return apiResponse(404, 'Invalid data  Please try again');
        }
        $user->notify(new SendOtpNotification());
        return apiResponse(200, 'Check your email');
    }
}
