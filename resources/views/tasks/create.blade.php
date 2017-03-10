<?php
/**
 * Created by PhpStorm.
 * User: Dimitar Statev
 * Date: 10.3.2017 г.
 * Time: 01:11 ч.
 */
?>
@extends('layouts.app')

@section('content')
    <div class="col-xs-12" style="text-align: center;">
        <h2>Create Task for Project "{{ $project->name }}"</h2>
        <div class="col-md-6" style="margin: 0 auto;float: none;text-align: left;">
            {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'class'=>'']) !!}
            @include('tasks/partials/_form', ['submit_text' => 'Create Task'])
            {!! Form::close() !!}
        </div>
        <p class="col-xs-12" style="text-align: center;">
            <a href="{{URL::previous()}}" class="btn btn-primary">Cancel</a>
        </p>
    </div>
@endsection
