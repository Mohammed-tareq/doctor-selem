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
}
