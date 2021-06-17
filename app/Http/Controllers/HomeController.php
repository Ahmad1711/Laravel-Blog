<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard')->with("users",User::all()->count())
                                      ->with("categories",Category::all()->count())
                                      ->with("posts",Post::all()->count())
                                      ->with("tags", Tag::all()->count())
                                      ->with("trashed", Post::onlyTrashed()->get()->count()) ;
    }
}
