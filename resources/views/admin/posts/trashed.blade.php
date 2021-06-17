@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        All Trashed Posts
    </div>
    <div class="card-body">
        <table class="table table-light">
            <thead>
                <td>Image</td>
                <td>Title</td>
                <td>Restore</td>
                <td>Delete</td>
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
                        <a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success">
                            Restore
                        </a>
                    </td>
                    <td>
                        <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5" class="text-center">No Trashed Posts yet.</th>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>
@stop