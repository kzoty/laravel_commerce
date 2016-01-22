<div class="form-group">
	{!! Form::label('title','Title') !!}
	{!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description','Description') !!}
	{!! Form::textarea('description',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('category_id','Category') !!}
	{!! Form::select('category_id',$category,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
</div>