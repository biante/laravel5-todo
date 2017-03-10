@extends('layouts.app')

@section('content')
    <div class="col-xs-12" style="text-align: center;">
        <h2>Create Project</h2>


    {!! Form::model(new App\Project, ['route' => ['projects.store']]) !!}
    @include('projects/partials/_form', ['submit_text' => 'Create Project'])
    {!! Form::close() !!}

        <p class="col-xs-12" style="text-align: center;">
            <button type="button" class="btn btn-secondary">{!! link_to_route('projects.index', 'Cancel') !!}</button>
        </p>
    </div>
@endsection