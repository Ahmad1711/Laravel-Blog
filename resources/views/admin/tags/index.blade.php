@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        All Tags
    </div>
    <div class="card-body">
        <table class="table table-light">
            <thead>
                <td>Tag Name</td>
                <td>Edit</td>
                <td>Delete</td>
            </thead>
            <tbody>
                @if($tags->count()>0)
                @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->tag}}
                    </td>
                    <td>
                        <a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-info">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="{{route('tag.destroy',['id'=>$tag->id])}}" class="btn btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5" class="text-center">No Tags yet.</th>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>
@stop