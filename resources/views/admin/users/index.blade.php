@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        All Users
    </div>
    <div class="card-body">
        <table class="table table-light">
            <thead>
                <td>Image</td>
                <td>Name</td>
                <td>Permissions</td>
                <td>Delete</td>
            </thead>
            <tbody>
                @if($users->count()>0)
                @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{$user->profile->avatar}}" width="60px" height="60px" alt="Faild Upload" style="border-radius:50%;">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        @if($user->admin && !Auth::user())
                        <a href="{{route('user.notadmin',['id'=>$user->id])}}" class="btn btn-danger">
                            Remove Permissions
                        </a>
                        @elseif(!$user->admin)
                        <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-success">
                            Make admin
                        </a>
                        @endif
                    </td>
                    <td>
                        @if(Auth::id()!=$user->id)
                        <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-danger">
                            Delete
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5" class="text-center">No Users yet.</th>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>
@stop