<?php

namespace App\Http\Controllers\Api\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    protected $otp;

    public function __construct()
    {
        $this->otp = new Otp();
    }
    public function __invoke(ResetPasswordRequest $request)
    {
            $user = User::whereEmail($request->only('email'))->first();
            if (!$user) {
                return apiResponse('404', 'User Not Found');
            }
            $otpCheck = $this->otp->validate($user->email , $request->token);
            if ($otpCheck->status === false) {
                return apiResponse('404', 'Invalid OTP Please try again');
            }

            if (Hash::check($request->password, $user->password)) {
                return apiResponse('400', 'The new password must be different from the old password');
            }

            $user->update(['password' => $request->password]);
            $user->tokens()->delete();
            return apiResponse('200', 'Password Changed Successfully');
    }
}
