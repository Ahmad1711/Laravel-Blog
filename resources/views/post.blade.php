@extends('layouts.front_layout')
@section('content')

<div class="col-md-12">
    <div class="blog-entry ftco-animate d-md-flex">
        <a href="{{route('post',['slug'=>$post->slug])}}" class="img img-2" style="background-image: url('{{$post->featured}}');"></a>
        <div class="text text-2 pl-md-4">
            <h3 class="mb-2"><a href="{{route('post',['slug'=>$post->slug])}}">{{$post->title}}</a></h3>
            <div class="meta-wrap">
                <p class="meta">
                    <span><i class="icon-calendar mr-2"></i>{{$post->created_at->diffForHumans()}}</span>
                    <span><a href="{{route('category',['id'=>$post->category->id])}}"><i class="icon-folder-o mr-2"></i>{{$post->category->name}}</a></span>
                    <!-- <span><i class="icon-comment2 mr-2"></i>5 Comment</span> -->
                    <span><a href="{{route('user',['id'=>$post->user_id])}}"><i class="icon-comment2 mr-2"></i>Author:{{$post->user->name}}</a></span>
                </p>
            </div>
            <p class="mb-4">{{$post->content}}</p>
        </div>
    </div>
</div>

@stop