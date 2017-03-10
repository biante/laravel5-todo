@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>
                        @if(Auth::user()->isDisabled())
                            You are not Active
                        @elseif(Auth::user()->isVisitor())
                            Welcome User
                        @elseif(Auth::user()->isAdmin())
                            Welcome Admin
                        @endif
                    </p>
                    <p>
                        {!! link_to_route('projects.index', 'View Projects') !!}
                    </p>
             </div>
         </div>
     </div>
 </div>
</div>
@endsection
