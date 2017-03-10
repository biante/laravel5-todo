@extends('layouts.app')

@section('content')
    <div class="col-xs-12 col-md-6" style="text-align: left;margin: 0 auto;float: none;">
        <h2>Edit Project</h2>

        {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]]) !!}
        @include('projects/partials/_form', ['submit_text' => 'Edit Project'])
        {!! Form::close() !!}
        <p class="col-xs-12" style="text-align: center;">
            <a href="{{URL::previous()}}" class="btn btn-primary">Back</a>
        </p>
    </div>
@endsection