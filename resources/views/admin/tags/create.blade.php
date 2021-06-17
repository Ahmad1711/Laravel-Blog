@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Create New Tag
    </div>
    <div class="card-body">
        <form action="{{route('tag.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="tname">Tag Name</label>
                <input id="tname" class="form-control" type="text" name="tname">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Store Tag
                </button>
            </div>
        </form>
    </div>
</div>
@stop