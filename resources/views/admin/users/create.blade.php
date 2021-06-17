@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Create New User
    </div>
    <div class="card-body">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="uname">User Name</label>
                <input id="uname" class="form-control" type="text" name="uname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Store User
                </button>
            </div>
        </form>
    </div>
</div>
@stop