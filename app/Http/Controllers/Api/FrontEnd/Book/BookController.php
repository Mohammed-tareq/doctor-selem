<?php

namespace App\Http\Controllers\Api\FrontEnd\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Books\BookCollection;
use App\Models\Book;

class BookController extends Controller
{
    public function getBooks()
    {
        $search = request('keyword', null);

        $books = Book::when($search,
            fn($q) => $q->where("title", "like", "%$search%")
        )->latest()->paginate('9');

        if (!$books) apiResponse(404, 'books not found');

        return apiResponse(200, 'success',
            new BookCollection($books)->response()->getData(true));
    }
}
