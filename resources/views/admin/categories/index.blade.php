@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        All Categories
    </div>
    <div class="card-body">
        <table class="table table-light">
            <thead>
                <td>Name</td>
                <td>Edit</td>
                <td>Delete</td>
            </thead>
            <tbody>
                @if($categories->count()>0)
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-info">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="{{route('category.destroy',['id'=>$category->id])}}" class="btn btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="5" class="text-center">No Categories yet.</th>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>
@stop