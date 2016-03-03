<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <div class="input-group">
        <div class="input-group-addon">$</div>
        {!! Form::text('price',null, ['class'=>'form-control','placeholder'=>'Price']) !!}
    </div>
</div>

<div class="checkbox">
    <label>
        {!! Form::hidden('featured', 0) !!}
        {!! Form::checkbox('featured', 1, null) !!} Featured
    </label>
</div>

<div class="checkbox">
    <label>
        {!! Form::hidden('recommended', 0) !!}
        {!! Form::checkbox('recommended', 1, null) !!} Recommended
    </label>
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::text('tag_list', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class'=> 'btn btn-primary']) !!}
    <a href="{{route('admin.products')}}" class="btn btn-default">Back</a>
</div>