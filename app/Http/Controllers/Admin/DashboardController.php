<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;


class DashboardController extends Controller
{
    public function index()
    {
        $lastcars = Book::orderBy('created_at','desc')->take(3)->get();
        return view('admin.dashboard' , compact('lastcars'));
    }
}
