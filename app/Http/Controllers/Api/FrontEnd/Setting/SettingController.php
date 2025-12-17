<?php

namespace App\Http\Controllers\Api\FrontEnd\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $setting = Setting::first();
        if(!$setting) apiResponse(404, 'setting not found');

        return apiResponse(200, 'success', $setting);
    }
}
