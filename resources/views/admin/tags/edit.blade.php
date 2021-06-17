@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Update Tag : {{$tag->tag}}
    </div>
    <div class="card-body">
        <form action="{{route('tag.update',['id'=>$tag->id] )}}" method="post">
            @csrf
            <div class="form-group">
                <label for="tname">Tag Name</label>
                <input id="tname" class="form-control" type="text" name="tname" value="{{$tag->tag}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update Tag
                </button>
            </div>
        </form>
    </div>
</div>
@stop