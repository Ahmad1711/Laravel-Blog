@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        My Profile
    </div>
    <div class="card-body">
        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="uname">User Name</label>
                <input id="uname" class="form-control" type="text" name="uname" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="pass">New Password</label>
                <input id="pass" class="form-control" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="avatar">Upload Avatar</label>
                <input id="avatar" class="form-control-file border" type="file" name="avatar">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input id="facebook" class="form-control-file border" type="url" name="facebook" value="{{$user->profile->facebook}}">
            </div>
            <div class="form-group">
                <label for="youtube">Youtube URL</label>
                <input id="youtube" class="form-control-file border" type="url" name="youtube" value="{{$user->profile->youtube}}">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea id="about" class="form-control" rows="5" cols="20" name="about">{{$user->profile->about}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@stop