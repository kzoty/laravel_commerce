@extends('admin.base')

@section('content')
	<table class="table table-bordered">
		<thead>
			<th>#ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Category</th>
			<th>Actions</th>
		</thead>
		<tbody>
	@foreach($tests as $test)
		<tr>
			<td>{!! $test->id !!}</td>
			<td>{!! $test->title !!}</td>
			<td>{!! $test->description !!}</td>
			<td>
				@if( isset($test->category->name) )
					{!! $test->category->name !!}
				@endif
			</td>
			<td>
				<a href="{!! route('test.edit', ['id'=>$test->id]) !!}" class="btn btn-sm btn-default">EDIT</a>
				<a href="{!! route('test.destroy', ['id'=>$test->id]) !!}" class="btn btn-sm btn-danger pull-right">DEL</a>
			</td>
		</tr>
	@endforeach
		</tbody>
	</table>
	{!! $tests->render() !!}
@endsection()