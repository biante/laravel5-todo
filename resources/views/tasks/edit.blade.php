@extends('layouts.app')

@section('content')
    <div class="col-xs-12 col-md-6" style="text-align: left;margin: 0 auto;float: none;">
        <h2>Edit Task "{{ $task->name }}"</h2>

        {!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug]]) !!}
        @include('tasks/partials/_form', ['submit_text' => 'Edit Task'])
        {!! Form::close() !!}
        <p class="col-xs-12" style="text-align: center;">
            <a href="{{URL::previous()}}" class="btn btn-primary">Back</a>
        </p>
    </div>
@endsection