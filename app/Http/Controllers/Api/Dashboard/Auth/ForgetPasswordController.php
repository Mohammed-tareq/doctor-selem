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
            'email' => 'required|email|string|max:30|min:5',
        ]);

        $user = User::whereEmail($request->only('email'))->first();
        if ($user) {
            $user->notify(new SendOtpNotification());
        }
        return apiResponse(200, 'Check your email');
    }
}
