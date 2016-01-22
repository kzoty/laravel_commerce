@extends('admin.base')

@section('content')
    <h3>Images of "{{$product->name}}"</h3>
    <div class="pull-right">
        <a href="{!! route('admin.products.createimage', ['id'=>$product->id]) !!}" class="btn btn-default glyphicon glyphicon-plus"></a>
    </div>
    <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Image</th>
        <th>Extension</th>
        <th>Actions</th>
        </thead>
        @foreach($product->images as $image)
            <tbody>
            <tr>
                <td>{{$image->id}}</td>
                <td></td>
                <td>{{$image->description}}</td>
                <td>{{$image->extension}}</td>
                <td>
                    delete
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
@endsection