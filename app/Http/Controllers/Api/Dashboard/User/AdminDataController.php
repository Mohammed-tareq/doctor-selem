<?php

namespace App\Http\Controllers\Api\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Utils\ImageManagement;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDataController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) return apiResponse(404, 'user not found');
        return apiResponse(200, 'success', UserResource::make($user));
    }

    public function update(UserRequest $request)
    {

        $data = $request->validated();
        if (empty($data)) return apiResponse(422, 'validation error');
        $user = auth()->user();
        if (!$user) return apiResponse(404, 'user not found');
        DB::beginTransaction();
        $user->update([
            'name' => $data['name'] ?? $user->name,
            'full_name' => $data['full_name'] ?? $user->full_name,
            'email' => $data['email'] ?? $user->email,
            "password" => $data['password'] ?? $user->password,
            'bio' => $data['bio'] ?? $user->bio,
            'personal_aspect' => $data['personal_aspect'] ?? $user->personal_aspect,
            'educational_aspect' => $data['educational_aspect'] ?? $user->educational_aspect,
            'phone' => $data['phone'] ?? $user->phone,
        ]);

        $user = User::find($user->id);

        if ($request->hasFile('image_cover') || $request->hasFile('images') || $request->hasFile('cv')) {
            ImageManagement::storeUserImage($request, $user);
        }
        DB::commit();
        return apiResponse(200, 'user updated successfully', UserResource::make($user));
    }
}

