@extends('admin.base')

@section('content')
    <h3>Categories</h3>
    <div class="pull-right">
        <a href="{!! route('admin.categories.create') !!}" class="btn btn-default glyphicon glyphicon-plus"></a>
    </div>
    <table class="table table-hover">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        @foreach($categories as $category)
        <tbody>
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{route('admin.categories.edit',['id'=>$category->id])}}"><i class="btn btn-sm btn-primary glyphicon glyphicon-pencil"></i></a>
                <a class="pull-right" href="{{route('admin.categories.destroy',['id'=>$category->id])}}"><i class="glyphicon glyphicon-remove btn btn-sm btn-danger"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $categories->render() !!}
@endsection