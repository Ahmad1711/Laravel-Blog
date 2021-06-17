@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-header">Users</div>
            <div class="card-body">

                <h1>{{$users}}</h1>

            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-header">Categories</div>
            <div class="card-body">

                <h1>{{$categories}}</h1>

            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-header">Posts</div>
            <div class="card-body">

                <h1>{{$posts}}</h1>

            </div>
        </div>
    </div>
</div><br>
<div class="row justify-content-center">

    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-header">Tags</div>
            <div class="card-body">

                <h1>{{$tags}}</h1>

            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-header">Trashed</div>
            <div class="card-body">

                <h1>{{$trashed}}</h1>

            </div>
        </div>
    </div>

</div>

@endsection