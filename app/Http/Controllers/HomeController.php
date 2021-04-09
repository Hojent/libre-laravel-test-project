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
        $books = Book::all()
            ->sortBy('title')
           ;

        return view('home', [
            'authors' => $authors,
            'books' => $books,
        ]);
    }

    /**
     * Creats Models list by Brand ID
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function get_by_brand(Request $request)
    {
        //abort_unless(\Gate::allows('city_access'), 401);
        if (!$request->brand_id) {
            $html = '<option value="">Модель</option>';
        } else {
            $html = '';
            $models = CarModel::where('brand_id', $request->brand_id)->get();
            foreach ($models as $model) {
                $html .= '<option value="'.$model->id.'">'.$model->title.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
