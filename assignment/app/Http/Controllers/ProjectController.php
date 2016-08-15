<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use DB;
class ProjectController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request,[
			'title' =>'required|max:255',
			'description' => 'required',
			'status' => 'required',
			'category' => 'required',
			]);
    	$project=new Project;
    	$project->title=$request->title;
    	$project->description=$request->description;
    	$project->status=$request->status;
    	$project->category=$request->category;

    	$project->save();
    	return redirect('project/list');
    }
    public function update(Project $project, Request $request)
    {
    	$this->validate($request,[
			'title' =>'required|max:255',
			'description' => 'required',
			'status' => 'required',
			'category' => 'required',
			]);
    	$project=Project::find($project->id);
    	$project->title=$request->title;
    	$project->description=$request->description;
    	$project->status=$request->status;
    	$project->category=$request->category;
    	$project->save();
    	return redirect('project/list');
    }
    public function delete(Project $project)
    {
    	$project=Project::find($project->id);
    	$project->delete();
    	return redirect('project/list');
    }
}
