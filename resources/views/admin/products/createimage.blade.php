@extends('admin.base')

@section('content')
    <h3>Add image for "{{$product->name}}"</h3>
    {!! Form::open(['method'=>'post','files'=>true, 'route' => ['admin.products.storeimage',$product->id] ]) !!}
    <div class="form-group">
        {!! Form::label('image','Image: ') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group">
        <a href="{{ route('admin.products.images', ['id' => $product->id])  }}" class="btn btn-default">Cancel</a>
        {!! Form::submit('Upload Image',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    <div class="form-group">
    </div>
@endsection