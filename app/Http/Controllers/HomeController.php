<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authors = Author::pluck('name', 'id');
        $books = Book::all()->take(3)
            ->sortByDesc('updated_at')
           ;

        return view('home', [
            'authors' => $authors,
            'books' => $books,
        ]);
    }

}
