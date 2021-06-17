@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Update Post : {{$post->title}}
    </div>
    <div class="card-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" class="form-control" type="text" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select id="category" class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($post->category->id==$category->id) selected @endif >
                    {{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tag</label>
                @foreach($tags as $tag)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" @foreach($post->tags as $t)
                        @if($tag->id==$t->id)
                        checked
                        @endif
                        @endforeach>
                        {{$tag->tag}}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input id="featured" class="form-control-file border" type="file" name="featured">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" name="content" rows="5" cols="20">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update Post
                </button>
            </div>
        </form>
    </div>
</div>
@stop