@extends('layouts.front_layout')
@section('content')

@if($posts->count()>0)
@foreach($posts as $post)
<div class="col-md-12">
    <div class="blog-entry ftco-animate d-md-flex">
        <a href="{{route('post',['slug'=>$post->slug])}}" class="img img-2" style="background-image:url('{{$post->featured}}');"></a>
        <div class="text text-2 pl-md-4">
            <h3 class="mb-2"><a href="{{route('post',['slug'=>$post->slug])}}">{{$post->title}}</a></h3>
            <div class="meta-wrap">
                <p class="meta">
                    <span><i class="icon-calendar mr-2"></i>{{$post->created_at->toFormattedDateString()}}</span>
                    <span><a href="{{route('category',['slug'=>$post->category->slug])}}"><i class="icon-folder-o mr-2"></i>{{$post->category->name}}</a></span>
                    <!-- <span><i class="icon-comment2 mr-2"></i>5 Comment</span> -->
                    <span><a href="{{route('user',['id'=>$post->user_id])}}"><i class="icon-comment2 mr-2"></i>Author:{{$post->user->name}}</a></span>
                </p>
            </div>
            <p class="mb-4">{{substr($post->content,0,200)}}</p>
            <p><a href="{{route('post',['slug'=>$post->slug])}}" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
        </div>
    </div>
</div>
@endforeach

<div class="row" style="margin:auto">
    <div class="col">
        <div class="block-27">
            <ul>
                <li><a href="#">&lt;</a></li>
                @for ($j=0,$i=1; $i <= $ngroups; $i++,$j=$j+4) <li class="active"><a href="{{route('nextposts',['skip'=>$j])}}">{{$i}}</a></li>
                    @endfor
                    <li><a href="#">&gt;</a></li>
            </ul>
        </div>
    </div>
</div>
@else
<h3 class="mb-2" style="margin:auto">No Posts yet.</h3>
@endif
@stop