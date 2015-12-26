@extends('admin.base')

@section('content')
    <h3>Categories</h3>
    <table class="table table-hover">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
        </thead>
        @foreach($categories as $category)
        <tbody>
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection