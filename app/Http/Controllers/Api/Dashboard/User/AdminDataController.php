<?php

namespace App\Http\Controllers\Api\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Utils\ImageManagement;
use Illuminate\Support\Facades\DB;

class AdminDataController extends Controller
{
    public function index()
    {
        return auth()->user();
    }
    public function update(UserRequest $request)
    {
        if(!$request->validated()){
            return apiResponse(400, 'validation error');
        }
        $data = $request->validated();
        $user = auth()->user();
        if (!$user) return apiResponse(404, 'user not found');
        DB::beginTransaction();
        $user->update($data);
        if($request->hasFile('image_cover')){
            ImageManagement::storeUserImage($request, $user);
        }

        return apiResponse(200, 'user updated successfully', $user);
    }
}

