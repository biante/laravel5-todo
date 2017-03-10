<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',$project->name , array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug',$project->slug , array('class' => 'form-control')) !!}
</div>
{{ Form::hidden('user_id', Auth::user()->id) }}
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>