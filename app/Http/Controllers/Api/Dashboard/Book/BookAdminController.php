<?php

namespace App\Http\Controllers\Api\Dashboard\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookRequest;
use App\Http\Resources\Books\BookCollection;
use App\Http\Resources\Books\BookResource;
use App\Http\Utils\ImageManagement;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookAdminController extends Controller
{
    public function index()
    {
        $search = request('keyword', null);
        $per_page = request('per_page', 9);
        $search = $search ? trim(strip_tags($search)) : null;

        $books = Book::when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->latest()
            ->paginate($per_page);
        if ($books->isEmpty()) apiResponse(404, 'books not found');
        return apiResponse(200, 'success', new BookCollection($books));

    }

    public function show($id)
    {
        $book = Book::with('category')->find($id);
        if (!$book) apiResponse(404, 'book not found');
        return apiResponse(200, 'success', BookResource::make($book));
    }

    public function store(BookRequest $request)
    {
        try {
            DB::beginTransaction();
            $book = Book::create($request->except('images'));

            if (!$book) {
                return apiResponse(400, 'failed to create book');
            }

            if ($request->hasFile('images')) {
                ImageManagement::storeBook($request, $book);
            }
            DB::commit();
            $book->load('category');
            return apiResponse(201, 'book created successfully', BookResource::make($book));

        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return apiResponse(500, 'Internal server error');
        }
    }

    public function update(BookRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $book = Book::find($id);
            if (!$book) {
                return apiResponse(404, 'book not found');
            }

            $book->update($request->except('images'));

            if ($request->hasFile('images')) {
                ImageManagement::storeBook($request, $book);
            }
            DB::commit();
            $book->load('category');
            return apiResponse(200, 'book updated successfully', BookResource::make($book));

        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'Internal server error');
        }

    }

    public function delete($id)
    {
        $book = Book::find($id);
        if (!$book) {
            apiResponse(404, 'book not found');
        }
        foreach ($book->images as $image) {
            ImageManagement::deleteImage($image);
        }
        $book->delete();
        return apiResponse(200, 'book deleted successfully');
    }
}
