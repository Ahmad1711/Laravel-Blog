<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        if($categories->count()==0||$tags->count() == 0)
        {
        session()->flash('info', 'You must add categories and tags before add post');
        return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
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
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ]);

        //upload image file to uploads/posts
        $featured=$request->featured;
        $featured_new=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new);
        
        //store post data in database
        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->featured='uploads/posts/'.$featured_new;
        $post->category_id=$request->category_id;
        $post->slug=str_slug($request->title);
        $post->user_id=Auth::id();
        if($post->save()){
            $post->tags()->attach($request->tags);
        }
        session()->flash('success', 'Post Was Created Successfully');
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags);
                                                           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ]);
        $post=Post::find($id);
        if($request->hasFile('featured'))
        {
            //upload image file to uploads/posts
            $featured = $request->featured;
            $featured_new = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new);
            $post->featured ='uploads/posts/' . $featured_new;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        session()->flash('success', 'Post was Updated successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        $post->save();
        session()->flash('success', 'Post Was Trashed Successfully');
        return redirect()->route('post.index');
    }

    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function delete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        session()->flash('success', 'Post Was Deleted Permanently');
        return redirect()->route('post.trashed');

        
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        session()->flash('success', 'Post Was restored');
        return redirect()->route('post.index');
    }
}
