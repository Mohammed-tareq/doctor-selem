<?php

namespace App\Http\Controllers\Api\FrontEnd\Subscribe;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubcribeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $request->validate([
            'email' => 'required|email:rfc,dns',
        ], [
            'email.required' => 'We need your email address!',
            'email.email' => 'Please enter a valid email format.',
        ]);

        $email = $request->input('email');
        $subscription = Subscribe::whereEmail($email)->first();

        if ($subscription) return apiResponse(400, 'You are already subscribed');

        $subscription = Subscribe::create(['email' => $email]);
        if (!$subscription) return apiResponse(500, 'Something went wrong');
        return apiResponse(200, 'Subscribed successfully');
    }
}
