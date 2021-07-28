<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return Book::join('categories', 'books.category_id', 'categories.id')
            ->join('users', 'books.user_id', 'users.id')
            ->select('title', 'name', 'category')
            ->get();
    }
}
