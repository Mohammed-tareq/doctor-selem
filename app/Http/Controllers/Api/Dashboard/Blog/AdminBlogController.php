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
        if ($blogs->isEmpty()) return apiResponse(404, 'blogs not found');
        return apiResponse(200, 'success', new BlogCollection($blogs));
    }


    public function show($id)
    {
        $blog = Blog::with('category')->find($id);
        if (!$blog) return apiResponse(404, 'blog not found');
        $blog->increment('num_view');
        return apiResponse(200, 'success', BlogResource::make($blog));
    }

    public function store(BlogRequest $request)
    {
        if (!$request->validated()) return apiResponse(422, 'validation error');
        $cleanData = $request->validated();

        try {
            DB::beginTransaction();
            $blog = Blog::create([
                'title' => $cleanData['title'],
                'category_id' => $cleanData['category_id'],
                'content' => $cleanData['content'],
                'date' => $cleanData['date'],
                'publisher' => $cleanData['publisher'],
            ]);
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
            return apiResponse(500, $e->getMessage());
        }
    }

    public function update(BlogRequest $request, $id)
    {

        if (!$request->validated()) return apiResponse(422, 'validation error');
        $data = $request->validated();
        try {
            $blog = Blog::find($id);
            if (!$blog) {
                return apiResponse(404, 'blog not found');
            }

            DB::beginTransaction();
            $blog->update([
                'title' => $data['title'] ?? $blog->title,
                'category_id' => $data['category_id'] ?? $blog->category_id,
                'content' => $data['content'] ?? $blog->content,
                'num_view' => $blog->num_view,
                'date' => $data['date'] ?? $blog->date,
                'publisher' => $data['publisher'] ?? $blog->publisher,
            ]);
            if ($request->hasFile('image_cover') || $request->has('image_content')) {
                ImageManagement::storeBlogImage($request, $blog);
            }
            $blog->load('category');
            DB::commit();
            return apiResponse(200, 'blog updated successfully', BlogResource::make($blog));
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, $e->getMessage());
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


