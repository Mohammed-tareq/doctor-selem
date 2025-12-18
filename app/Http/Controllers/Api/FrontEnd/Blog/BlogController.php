<?php

namespace App\Http\Controllers\Api\FrontEnd\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blogs\BlogCollection;
use App\Http\Resources\Blogs\BlogResource;
use App\Models\Blog;

class BlogController extends Controller
{
    public function getBlogs()
    {
        $search = request('keyword', null);
        $per_page = request('per_page', 9);
        $clean = strip_tags($search);
        $search = trim($clean);

        $blogs = Blog::when($search, fn($query) =>
            $query->where('title', 'like', "%{$search}%")
        )->latest()->paginate($per_page);

        if(!$blogs) apiResponse(404, 'blogs not found');

        return apiResponse(200, 'success', new BlogCollection($blogs));
    }

    public function getBlog($id)
    {
        $blog = Blog::with('category')->find($id);

        if(!$blog) apiResponse(404, 'blog not found');

        return apiResponse(200, 'success', BlogResource::make($blog));
    }
}
