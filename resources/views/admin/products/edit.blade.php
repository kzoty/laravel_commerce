@extends('admin.base')

@section('content')
    <h3>Edit Product</h3>
    @if( $errors->any() )
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $eachError)
                    <li>{{$eachError}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($product, ['route'=>['admin.products.update',$product->id], 'method' =>'put']) !!}
    @include('admin.products.fields')
    {!! Form::close() !!}
@endsection()