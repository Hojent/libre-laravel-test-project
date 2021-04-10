<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Log;

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

        $books = Book::take(self::BLOG_PAGES)->get()
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

    // Fetch More Data
    function more_data(Request $request){
        if($request->ajax()){
            $skip=$request->skip;
            $take=2;
            $books=Book::skip($skip)->take($take)->get();
            foreach ($books as $book) {
                $book->author_id = $book->author->name;
            }
            return response()->json($books);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }

}
