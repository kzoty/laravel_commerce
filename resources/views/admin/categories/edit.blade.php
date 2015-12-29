@extends('admin.base')

@section('content')
    <h3>Edit Category</h3>
    @if( $errors->any() )
        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach($errors->all() as $eachError)
                <li>{{$eachError}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($category, ['route'=>['admin.categories.update', $category->id], 'method'=>'put']) !!}
    @include('admin.categories.fields')
    {!! Form::close() !!}
@endsection