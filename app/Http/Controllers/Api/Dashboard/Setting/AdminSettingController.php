<?php

namespace App\Http\Controllers\Api\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\SettingSiteRequest;
use App\Http\Utils\ImageManagement;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class AdminSettingController extends Controller
{
    public function updateSetting(SettingSiteRequest $request)
    {
        if (!$request->validated()) return apiResponse(422, 'validation error');
        $data = $request->validated();
        try {
            $setting = Setting::first();
            if (!$setting) return apiResponse(404, 'setting not found');
            DB::beginTransaction();
            $updated = $setting->update([
                'site_name' => $data['site_name'] ?? $setting->site_name,
                'site_email' => $data['site_email'] ?? $setting->site_email,
                'site_phone' => $data['site_phone'] ?? $setting->site_phone,
                'logo' => $setting->logo,
                'favicon' => $setting->favicon,
                'facebook' => $data['facebook'] ?? $setting->facebook,
                'twitter' => $data['twitter'] ?? $setting->twitter,
                'linkedin' => $data['linkedin'] ?? $setting->linkedin,
                'instagram' => $data['instagram'] ?? $setting->instagram,
                'footer' => $data['footer'] ?? $setting->footer,
            ]);
            if (!$updated) return apiResponse(400, 'failed to update setting');
            if ($request->hasFile('logo')) {
                ImageManagement::StoreSettingImage($request, $setting);
            }
            if ($request->hasFile('favicon')) {
                ImageManagement::StoreSettingImage($request, $setting);
            }
            DB::commit();
            $setting->refresh();

            return apiResponse(200, 'setting updated successfully', $setting);
        } catch (\Exception $e) {
            return apiResponse(500, 'error');
        }

    }
}
