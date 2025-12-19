<?php

namespace App\Http\Controllers\Api\FrontEnd\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Books\BookCollection;
use App\Http\Resources\Books\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function getBooks()
    {
        $search = request('keyword', null);
        $per_page = request('per_page', 9);
        $clean = strip_tags($search);
        $search = trim($clean);

        $books = Book::when($search, fn($q) => $q->where("title", "like", "%{$search}%"))
            ->latest()
            ->paginate($per_page);
        if (!$books) apiResponse(404, 'books not found');

        return apiResponse(
            200,
            'success',
        new BookCollection($books)
        );
    }

    public function getBook($id)
    {
        $book = Book::with('category')->find($id);
        if (!$book) apiResponse(404, 'book not found');
        return apiResponse(200, 'success', BookResource::make($book));
    }
}
