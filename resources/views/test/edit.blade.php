@extends('admin.base')

@section('content')
	{!! Form::model($test, ['route'=>['test.update',$test->id], 'method' =>'put']) !!}

	@include('test.fields')

	{!! Form::close() !!}
@endsection()