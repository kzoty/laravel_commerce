@extends('admin.base')

@section('content')
    <h3>New Product</h3>
    @if( $errors->any() )
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $eachError)
                    <li>{{$eachError}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route'=>'admin.products.store']) !!}
    @include('admin.products.fields')
    {!! Form::close() !!}
@endsection()