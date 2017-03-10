<?php
/**
 * Created by PhpStorm.
 * User: Dimitar Statev
 * Date: 10.3.2017 г.
 * Time: 00:45 ч.
 */
?>
@extends('layouts.app')

@section('content')
    <div class="col-xs-12" style="text-align: center;">
        <h2>Projects</h2>
    </div>
    @if ( !$projects->count() )
        <div class="col-xs-12" style="text-align: center;">
            <h2>You have no projects.</h2>
        </div>
        <p class="col-xs-12" style="text-align: center;">
            <button type="button" class="btn btn-success">{!! link_to_route('projects.create', 'Create Project!') !!}</button>
        </p>
    @else
        <table class="table table-responsive col-xs-12 col-md-6" style="width: auto;margin: 0 auto;float: none;">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach( $projects as $project )
                    <tr>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
                        <th scope="row">{{ $project->id }}</th>
                        <td><a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a></td>
                        <td>{!! link_to_route('projects.edit', 'Edit', array($project->slug), array('class' => 'btn btn-info')) !!}</td>
                        <td>{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}</td>
                    {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="col-xs-12" style="text-align: center;">
            <button type="button" class="btn btn-success">{!! link_to_route('projects.create', 'Create Project!') !!}</button>
        </p>
    @endif
@endsection

