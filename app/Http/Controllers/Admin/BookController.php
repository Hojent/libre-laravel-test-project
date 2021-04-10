<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File;
use App\Book;
use App\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(3);
        return view('admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $authors = Author::pluck('name', 'id');
            return view('admin.books.create', [
                'authors' => $authors,
            ]);
        } catch (\Exception $exception) {
            echo ('Create book controller: error :' . $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           'title' => 'required',
            'author_id' => 'required|numeric',
        ],
            [   'title.required' => 'Введите заголовок',
                'author_id.required' => 'Укажите автора',
        ]);
        $book = Book::add($request->all());
        $book->uploadImage($request->file('image'));
        $book->setAuthor($request->get('author_id'));
        return redirect(route('books.index'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        try {
        $authors = Author::pluck('name','id');
        $author = $book->getAuthorID();
        return view('admin.books.edit', compact(
            'authors',
            'book',
            'author'
        ));
        } catch (\Exception $exception) {
            echo ('Edit book controller: SQL error :' . $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title'	=>	'required',

        ]);
        $book->update($request->all());
        $book->uploadImage($request->file('image'));
        $book->setAuthor($request->get('author_id'));

        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->remove();
        return redirect()->route('books.index');
    }

    public function author($author_id)
    {
        $books = Book::where('author_id', '=', $author_id)->get();
        $authorName = $books->first()->getAuthor() ?? 'empty';
        return view('admin.books.index', [
            'books' => $books,
            'authorTitle' => $authorName,
        ]);
    }
}
