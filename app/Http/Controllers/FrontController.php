<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use App\User;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    
    public function index()
    {
        $nposts=Post::all();
        return view('related_post')->with('posts',Post::orderBy('created_at','desc')->take(4)->get())
                                    ->with('ngroups', ceil($nposts->count()/4))
                                    ->with('categories',Category::all())
                                    ->with('tags',Tag::all())
                                    ->with('settings',Setting::first());
    }
    public function post($slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('post')->with('post',$post) 
                           ->with('categories', Category::all())
                           ->with('tags', Tag::all())
                           ->with('settings', Setting::first());
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $nposts = Post::all();
        return view('related_post')->with('posts', $category->posts)
                                     ->with('ngroups', ceil($nposts->count() / 4))
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all())
                                    ->with('settings', Setting::first());
    }
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $nposts = Post::all();
        return view('related_post')->with('posts', $tag->posts)
                                   ->with('ngroups', ceil($nposts->count() / 4))   
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all())
                                    ->with('settings', Setting::first());
    }

    public function user($id)
    {
        $user = User::find($id);
        $nposts = Post::all();
        return view('related_post')->with('posts', $user->posts)
                                    ->with('ngroups', ceil($nposts->count() / 4)) 
                                   ->with('categories', Category::all())
                                   ->with('tags', Tag::all())
                                   ->with('settings', Setting::first());
    }

    public function search(Request $request)
    {
        
        $posts=Post::where('title','like','%'.$request->keyword.'%')->get();
        $nposts = Post::all();
        return view('related_post')->with('posts',$posts)
                                    ->with('ngroups', ceil($nposts->count() / 4)) 
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all())
                                    ->with('settings', Setting::first());
        
    }

    public function nextposts($skip)
    {
        $nposts = Post::all();
        return view('related_post')->with('posts', Post::orderBy('created_at', 'desc')->skip($skip)->take(4)->get())
                                    ->with('ngroups', ceil($nposts->count() / 4))
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all())
                                    ->with('settings', Setting::first());
    }

}
