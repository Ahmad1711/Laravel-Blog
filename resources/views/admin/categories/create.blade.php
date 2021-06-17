@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Create New Category
    </div>
    <div class="card-body">
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="cname">Category Name</label>
                <input id="cname" class="form-control" type="text" name="cname">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Store Category
                </button>
            </div>
        </form>
    </div>
</div>
@stop