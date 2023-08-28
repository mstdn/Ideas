<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index', [
            'categories'        =>  Category::with('posts')->latest()->paginate(),
            'recent'            =>  Post::with('user', 'category', 'comments')->latest()->paginate(),
            'post'              =>  Post::with('user', 'category', 'comments')->latest()->first()
        ]);
    }
}
