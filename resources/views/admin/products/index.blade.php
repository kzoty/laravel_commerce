@extends('admin.base')

@section('content')
    <h3>Products</h3>
    <div class="pull-right">
        <a href="{!! route('admin.products.create') !!}" class="btn btn-default glyphicon glyphicon-plus"></a>
    </div>
    <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Featured</th>
        <th>Recommended</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
        </thead>
        @foreach($products as $product)
            <tbody>
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->featured}}</td>
                <td>{{$product->recommended}}</td>
                <td>{{$product->category->name}}</td>
                <td>$ {{$product->price}}</td>
                <td>
                    <a href="{{route('admin.products.edit',['id'=>$product->id])}}"><i class="btn btn-sm btn-primary glyphicon glyphicon-pencil"></i></a>
                    <a href="{{route('admin.products.images',['id'=>$product->id])}}"><i class="btn btn-sm btn-default glyphicon glyphicon-picture"></i></a>
                    <a class="pull-right" href="{{route('admin.products.destroy',['id'=>$product->id])}}"><i class="glyphicon glyphicon-remove btn btn-sm btn-danger"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
    {!! $products->render() !!}
@endsection