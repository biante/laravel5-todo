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
    <div class="col-xs-12" style="text-align: center;" xmlns="http://www.w3.org/1999/html">
        <h2>Project Name: {!! link_to_route('projects.show', $project->name, [$project->slug]) !!}</h2>
        <h3>Task Name: {{ $task->name }}</h3>
        <h3>Description:</h3>
        {{ $task->description }}
        <hr>
       <p>
           <a href="{{URL::previous()}}" class="btn btn-primary">Back</a>
       </p>
    </div>
@endsection
