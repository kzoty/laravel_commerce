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
    <div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Category', ['class'=> 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@endsection