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
                <td><img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80"></td>
                <td>{{$image->description}}</td>
                <td>{{$image->extension}}</td>
                <td>
                    <a href="{{route('admin.products.destroyimage', ['id'=>$image->id])}}" class="btn btn-sm btn-danger glyphicon glyphicon-remove"></a>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
    <a href="{{route('admin.products')}}" class="btn btn-default">Back</a>
@endsection