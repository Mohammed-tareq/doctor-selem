<?php

namespace App\Http\Controllers\Api\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Http\Resources\Blogs\BlogCollection;
use App\Http\Resources\Blogs\BlogResource;
use App\Http\Utils\ImageManagement;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class AdminBlogController extends Controller
{
    public function index()
    {
        $serach = request('keyword', null);
        $per_page = request('per_page', 9);
        $serach = $serach ? trim(strip_tags($serach)) : null;

        $blogs = Blog::when($serach, fn($q) => $q->where('title', 'like', "%{$serach}%"))
            ->latest()
            ->paginate($per_page);
        if ($blogs->isEmpty()) apiResponse(404, 'blogs not found');
        return apiResponse(200, 'success', new BlogCollection($blogs));
    }


    public function show($id)
    {
        $blog = Blog::with('category')->find($id);
        if (!$blog) apiResponse(404, 'blog not found');
        $blog->increment('num_view');
        return apiResponse(200, 'success', BlogResource::make($blog));
    }

    public function store(BlogRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('image_cover', 'image_content');
            $blog = Blog::create($data);
            if (!$blog) {
                return apiResponse(400, 'failed to create blog');
            }

            if ($request->hasFile('image_cover') || $request->has('image_content')) {
                ImageManagement::storeBlogImage($request, $blog);
            }

            $blog->load('category');
            DB::commit();
            return apiResponse(201, 'blog created successfully', BlogResource::make($blog));
        } catch (\Exception $e) {
            DB::rollBack();

            return apiResponse(500, 'An error occurred while creating the blog');
        }
    }

    public function update(BlogRequest $request, $id)
    {
        try {
            $blog = Blog::find($id);
            if (!$blog) {
                return apiResponse(404, 'blog not found');
            }

            DB::beginTransaction();
            $data = $request->except('image_cover', 'image_content');
            $blog->update($data);
            if ($request->hasFile('image_cover') || $request->has('image_content')) {
                ImageManagement::storeBlogImage($request, $blog);
            }
            $blog->load('category');
            DB::commit();
            return apiResponse(200, 'blog updated successfully', BlogResource::make($blog));
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'An error occurred while updating the blog');
        }
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if (!$blog) apiResponse(404, 'blog not found');
        ImageManagement::deleteImage($blog->image_cover);
        ImageManagement::deleteImage($blog->image_content);
        $blog->delete();
        return apiResponse(200, 'blog deleted successfully');
    }
}


