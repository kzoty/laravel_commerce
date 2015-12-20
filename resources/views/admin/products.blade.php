@extends('admin.base')

@section('content')
    <h3>Products</h3>
    <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        </thead>
        @foreach($products as $product)
            <tbody>
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>$ {{$product->price}}</td>
            </tr>
            @endforeach
            </tbody>
    </table>
@endsection