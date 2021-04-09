<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller

{
    const BLOG_PAGES = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $books = Book::all()
            ->sortBy('title')
            //->paginate(self::BLOG_PAGES)
        ;
        return view('books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        return view('books.show', [
           'book' => $book,

       ]);
    }

}
