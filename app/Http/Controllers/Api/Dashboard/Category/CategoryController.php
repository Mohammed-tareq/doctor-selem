<?php

namespace App\Http\Controllers\Api\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'title')->get();
        return apiResponse(200, 'success', $categories);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string|max:50|min:3|unique:categories,title',
        ]);

        $category = Category::create($data);
        if (!$category) return apiResponse(400, 'failed to create category');
        return apiResponse(201, 'category created successfully', $category);
    }

    public function update($id)
    {

        $category = Category::find($id);
        if (!$category) return apiResponse(404, 'category not found');
        $data = request()->validate([
            'title' => 'required|string|max:50|min:3|unique:categories,title,' . $id,
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
