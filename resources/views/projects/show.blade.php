@extends('layouts.app')

@section('content')
    <div class="col-xs-12" style="text-align: center;">
        <h2>{{ $project->name }}</h2>
    </div>

    @if ( !$project->tasks->count() )
        <div class="col-xs-12" style="text-align: center;">
            <h2>Your project has no tasks.</h2>
        </div>
    @else
        <table class="table table-responsive col-xs-12 col-md-6" style="width: auto;margin: 0 auto;float: none;">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Task Completed</th>
                <th>Expiration Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $project->tasks as $task )
                <tr class="{{ date('Y-m-d H:i:s') }}">
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
                    <th scope="row">{{ $task->id }}</th>
                    <td><a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a></td>
                    <td>{{ $task->completed }}</td>
                    <td>{{ $task->expiration_date }}</td>
                    <td>{!! link_to_route('projects.tasks.edit', 'Edit', array($project->slug, $task->slug), array('class' => 'btn btn-info')) !!}</td>
                    <td>{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}</td>
                    {!! Form::close() !!}
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <p class="col-xs-12" style="text-align: center;">
        <button type="button" class="btn btn-secondary">{!! link_to_route('projects.index', 'Back to Projects') !!}</button>
        <button type="button" class="btn btn-success">{!! link_to_route('projects.tasks.create', 'Create Task', $project->slug) !!}</button>
    </p>
    <div class="btn-group col-xs-12" style="text-align: center;">
        <button type="button" class="btn btn-info">Export</button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu" id="export-menu">
            <li id="export-to-excel"><a href="{{URL::to('getExport')}}">Export To Excel</a> </li>
            <li class="divider"></li>
            <li><a href="#">Other</a> </li>
        </ul>

    </div>
@endsection