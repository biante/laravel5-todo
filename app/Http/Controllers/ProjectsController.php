<?php namespace App\Http\Controllers;

use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

use Input;
use Redirect;


use DB;
use App\Quotation;

class ProjectsController extends Controller {

    protected $rules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()) {
            $projects = Project::all();
            return view('projects.index', compact('projects'));
        }else {
            //$projects = Project::all();
            $userId = Auth::user()->id;
            $projects = Project::where('deleted', '!=', 1)->get();
            $projects = Project::where('user_id', '=', $userId)->get();
            return view('projects.index', compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $input = Input::all();
        Project::create( $input );

        return Redirect::route('projects.index')->with('message', 'Project created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function update(Project $project, Request $request)
    {
        $this->validate($request, $this->rules);

        $input = array_except(Input::all(), '_method');
        $project->update($input);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        //$project->delete();

        DB::table('projects')->where('id', $project->id)
            ->update(array('deleted' => '1'));

        return Redirect::route('projects.index')->with('message', 'Project deleted.');
    }
    //Display a listing of the all resources - Admin only
    public function adminIndex()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

}