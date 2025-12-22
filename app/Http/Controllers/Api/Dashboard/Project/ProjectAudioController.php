<?php

namespace App\Http\Controllers\Api\Dashboard\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Resources\Audios\ProjectResource;
use App\Http\Utils\ImageManagement;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectAudioController extends Controller
{
    public function index()
    {
        $projects = Project::withCount('audios')->get();
        return apiResponse(200, 'success', ProjectResource::collection($projects));
    }

    public function show($id)
    {
        $project = Project::with('audios')->find($id);
        if (!$project) apiResponse(404, 'project not found');
        return apiResponse(200, 'success', ProjectResource::make($project));
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        if (empty($data)) return apiResponse(422, 'validation error');

        $data['speaker'] = $request->speaker ?? auth()->user()->name;
        $project = Project::create([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'speaker' => $data['speaker'],
        ]);
        if (!$project) apiResponse(400, 'failed to create project');
        if ($request->hasFile('image_cover')) {
            ImageManagement::storeProjectImage($request, $project);
        }
        return apiResponse(201, 'project created successfully', ProjectResource::make($project));
    }

    public function update(projectRequest $request, $id)
    {
        $data = $request->validated();
        if(empty($data)) return apiResponse(422, 'validation error');
        try {
            DB::beginTransaction();
            $project = Project::find($id);
            if (!$project) {
                return apiResponse(404, 'project not found');
            }
            $data = $request->except('image_cover');
            $data['speaker'] = $request->speaker ?? auth()->user()->name;
            $project->update([
                'title' => $data['title'] ?? $project->title,
                'category_id' => $data['category_id'] ?? $project->category_id,
                'speaker' => $data['speaker'] ?? $project->speaker,
            ]);
            if (!$project) {
                return apiResponse(400, 'failed to update project');
            }
            if ($request->hasFile('image_cover')) {
                ImageManagement::storeProjectImage($request, $project);
            }
            DB::commit();
            return apiResponse(200, 'project updated successfully', ProjectResource::make($project));

        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'Internal server error');
        }

    }

    public function delete($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return apiResponse(404, 'project not found');
        }
        ImageManagement::deleteImage($project->image_cover);
        $project->delete();
        return apiResponse(200, 'project deleted successfully');
    }
}
