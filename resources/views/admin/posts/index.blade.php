@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        All Posts
    </div>
    <div class="card-body">
        <table class="table table-light">
            <thead>
                <td>Image</td>
                <td>Title</td>
                <td>Edit</td>
                <td>Trash</td>
            </thead>
            <tbody>
                @if($posts->count()>0)
                @foreach($posts as $post)
                <tr>
                    <td>
                        <img src="{{$post->featured}}" width="90px" height="50px" alt="Faild Upload">
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="{{route('post.destroy',['id'=>$post->id])}}" class="btn btn-danger">
                            Trash
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5" class="text-center">No Posts yet.</th>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>
@stop