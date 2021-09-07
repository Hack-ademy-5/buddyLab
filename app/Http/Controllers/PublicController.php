<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::orderBy('created_at','desc')->take(4)->get(); //Devolver Ultimos 5 articulos ordenados por fecha created_at

        return view('home',compact ('articles'));
    }
}
