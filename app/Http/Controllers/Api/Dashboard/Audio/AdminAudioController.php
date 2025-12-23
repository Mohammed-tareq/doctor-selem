<?php

namespace App\Http\Controllers\Api\Dashboard\Audio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Audio\AudioRequest;
use App\Http\Resources\Audios\AudioResource;
use App\Http\Utils\ImageManagement;
use App\Models\Audio;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class AdminAudioController extends Controller
{

    public function store(AudioRequest $request)
    {
        $data = $request->validated();
        if (empty($data)) return apiResponse(422, 'validation error');
        try {
            $project = Project::find($request->project_id ?? null);
            if (!$project) return apiResponse(404, 'project not found');

            DB::beginTransaction();
            $audio = $project->audios()->create([
                'title' => $data['title'],
                'details' => $data['details'],
            ]);
            if (!$audio) return apiResponse(500, 'Internal server error');

            if ($request->hasFile('content')) {
                if ($audio->content) {
                    ImageManagement::deleteImage($audio->content);
                }
                $audio->content = ImageManagement::uploadImage($request->file('content'), 'audio');
                $getID3 = new \getID3();
                $fileInfo = $getID3->analyze($request->file('content')->getPathname());
                $duration = isset($fileInfo['playtime_seconds']) ? $fileInfo['playtime_seconds'] : null;
                $audio->duration = $duration;

                $audio->save();
            }
            DB::commit();
            $audio->load('project.category');
            return apiResponse(201, 'audio created successfully', AudioResource::make($audio));
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, $e->getMessage());
        }
    }

    public function update(AudioRequest $request, $id)
    {
        $data = $request->validated();
        if (empty($data)) return apiResponse(422, 'validation error');

        try {
            $audio = Audio::find($id);
            if (!$audio) return apiResponse(404, 'audio not found');

            DB::beginTransaction();

            $audio->update([
                'title'      => $data['title'] ?? $audio->title,
                'project_id' => $data['project_id'] ?? $audio->project_id,
                'details'    => $data['details'] ?? $audio->details,
            ]);

            if ($request->hasFile('content')) {
                $file = $request->file('content');

                if ($audio->content) {
                    ImageManagement::deleteImage($audio->content);
                }

                $audio->content = ImageManagement::uploadImage($file, 'audio');

                if ($file) {
                    $getID3 = new \getID3();
                    $fileInfo = $getID3->analyze($file->getPathname());
                    $audio->duration = $fileInfo['playtime_seconds'] ?? null;
                }

                $audio->save();
            }

            DB::commit();
            $audio->load('project.category');

            return apiResponse(200, 'audio updated successfully', AudioResource::make($audio));
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'Internal server error');
        }
    }

    public function delete($id)
    {
        $audio = Audio::find($id);
        if (!$audio) return apiResponse(404, 'audio not found');
        ImageManagement::deleteImage($audio->content);
        $audio->delete();
        return apiResponse(200, 'audio deleted successfully');


    }

}