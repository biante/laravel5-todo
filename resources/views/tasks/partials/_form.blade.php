<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $task->name , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', $task->slug , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('completed', 'Completed:') !!}
    {!! Form::checkbox('completed') !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', $task->description, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('expiration_date', 'Expiration Date:') !!}
    {!! Form::date('expiration_date', $task->expiration_date, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text) !!}
</div>