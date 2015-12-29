@extends('admin.base')

@section('content')
    <h3>Create Category</h3>
    @if( $errors->any() )
        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach($errors->all() as $eachError)
                <li>{{$eachError}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['url'=>'/admin/categories/store']) !!}
    @include('admin.categories.fields')
    {!! Form::close() !!}
@endsection