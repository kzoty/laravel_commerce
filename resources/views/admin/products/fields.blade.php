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
        {!! Form::checkbox('featured', 1, null) !!} Featured
    </label>
</div>

<div class="checkbox">
    <label>
        {!! Form::checkbox('recommended', 1, null) !!} Recommended
    </label>
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class'=> 'btn btn-primary']) !!}
</div>