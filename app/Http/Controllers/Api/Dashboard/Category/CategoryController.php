<?php

namespace App\Http\Controllers\Api\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'title')->get();
        return apiResponse(200, 'success', CategoryResource::collection($categories));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string|max:50|min:3|regex:/^[a-zA-Z0-9\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF},.!?؛،\-_()]+$/u|unique:categories,title',
        ]);

        $category = Category::create($data);
        if (!$category) return apiResponse(400, 'failed to create category');
        return apiResponse(201, 'category created successfully', CategoryResource::make($category));
    }

    public function update($id)
    {


        $category = Category::find($id);
        if (!$category) return apiResponse(404, 'category not found');
        $data = request()->validate([
            'title' => 'required|string|max:50|min:3|regex:/^[a-zA-Z0-9\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF},.!?؛،\-_()]+$/u|unique:categories,title,' . $id,
        ]);
        $category->update($data);
        return apiResponse(200, 'category updated successfully', $category);
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if (!$category) return apiResponse(404, 'category not found');
        $category->delete();
        return apiResponse(200, 'category deleted successfully');
    }
}
