<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection as BookCollectionResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index() 
    {
        $books = new BookCollectionResource(Book::paginate());
        return $books;
    }

    public function view($id) 
    {
        $book = new BookResource(Book::find($id));
        return $book;
    }
}
