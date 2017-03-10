<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\Http\Requests;
use App\Task;
use Input;
use DB;
use Excel;

class ExcelController extends Controller
{
    /**
    *@param  \App\Project $project
    *@return Response
    */

    public function getExport(Project $project){
        /*$tasks=Task::all();
        Excel::create('Export Data', function($excel) use($tasks){
            $excel->sheet('Sheet 1', function($sheet) use($tasks){
                $sheet->fromArray($tasks);
            });
        })->export('xlsx');
        */
        if(Auth::user()->isAdmin()) {
            $tasks=Task::all();
        }else {
            $tasks = Task::where('project_id', '=', $project->id )->get();
        }
        $filename = $project->name.'Tasks';
        Excel::create($filename, function($excel) use($tasks){
            $excel->sheet('Sheet 1', function($sheet) use($tasks){
               $sheet->fromArray($tasks);
                /*$sheet->fromArray(array(
                    array('error', 'dont zaspisva')
                ));*/
            });
        })->export('xlsx');

    }
}
