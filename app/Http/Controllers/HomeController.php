<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public static function helloworld()
    {
//        return "Hello World From theController ";
        return view('home.showData');
    }

    // Basic controller

    // Resource Controller
    public function index(){
        $blogs = Blog::all();
        return view('home.index',compact('blogs'));
    }
}
