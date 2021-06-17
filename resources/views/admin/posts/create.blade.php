@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Create New Post
    </div>
    <div class="card-body">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select id="category" class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tag</label>
                @foreach($tags as $tag)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
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
                <textarea id="content" class="form-control" name="content" rows="15" cols="20"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Store Post
                </button>
            </div>
        </form>

    </div>
</div>
@stop
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script> 
<script>
    $(document).ready(function() {
        $('#content').summernote();
    });
</script>
@stop