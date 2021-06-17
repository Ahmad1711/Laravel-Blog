@extends('layouts.app')
@section('content')

@include('admin.includes.error')

<div class="card">
    <div class="card-header">
        Blog Settings
    </div>
    <div class="card-body">
        <form action="{{route('setting.update')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="sname">Site_Name</label>
                <input id="sname" class="form-control" type="text" name="site_name" value="{{$settings->site_name}}">
            </div>
            <div class="form-group">
                <label for="cp">Contact_Phone</label>
                <input id="cp" class="form-control" type="tel" pattern="[+][0-9]{3}-[0-9]{9}" name="contact_phone" value="{{$settings->contact_phone}}">
            </div>
            <div class="form-group">
                <label for="ce">Contact_Email</label>
                <input id="ce" class="form-control" type="email" name="contact_email" value="{{$settings->contact_email}}">
            </div>
            <div class="form-group">
                <label for="ad">Address</label>
                <input id="ad" class="form-control" type="text" name="address" value="{{$settings->address}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update Settings
                </button>
            </div>
        </form>
    </div>
</div>
@stop