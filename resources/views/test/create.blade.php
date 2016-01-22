@extends('admin.base')

@section('content')
	{!! Form::open(['route' => 'test.store']) !!}

	@include('test.fields')

	{!! Form::close() !!}
@endsection()