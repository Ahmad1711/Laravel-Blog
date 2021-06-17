@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Update Category : {{$category->name}}
    </div>
    <div class="card-body">
        <form action="{{route('category.update',['id'=>$category->id] )}}" method="post">
            @csrf
            <div class="form-group">
                <label for="cname">Category Name</label>
                <input id="cname" class="form-control" type="text" name="cname" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
@stop