<?php

namespace App\Http\Controllers;
// use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Project;

class TaskController extends Controller
{
	// protected function validator(array $data)
	// {
	// 	$this->validate($request,[
	// 		'title' =>'required|max:255',
	// 		'description' => 'required',
	// 		'status' => 'required',
	// 		'category' => 'required',
	// 		]);
	// }

    public function store(Project $project, Request $request)
    {
    	$this->validate($request,[
			'title' =>'required|max:255',
			'description' => 'required',
			'status' => 'required',
			'category' => 'required',
			]);
    	$task=new Task;
    	$task->title=$request->title;
    	$task->description=$request->description;
    	$task->status=$request->status;
    	$task->category= $request->category;
    	$task->project_id=$project->id;
    	$task->save();
    	return redirect('project/detail/'.$project->id);
    }
    public function listTasks(Project $project=null)
    {
    	if($project!=null)
    	{
    		$tasks=$project->tasks();
    	}
    	else
    	{
    		$tasks=Task::all()->toArray();
    	}
    	return view('task.list')->with('tasks', $tasks);
    }
    public function update(Request $request, Task $task)
    {
    	# code...
		$this->validate($request,[
		'title' =>'required|max:255',
		'description' => 'required',
		'status' => 'required',
		'category' => 'required',
		]);
    	$task=Task::find($task->id);
    	$task->title=$request->title;
    	$task->description=$request->description;
    	$task->status=$request->status;
    	$task->category=$request->category;
    	$task->save();
    	return redirect('task/list/'.$task->project_id);
    }
    public function delete(Task $task){

    	$task=Task::find($task->id);
    	$task->delete();
    	return redirect('task/list/'.$task->project_id);
    }
    public function assign(Request $request, Task $task)
    {
    	$task=Task::find($task->id);
    	$task->users()->attach($request->assignee);
    	return redirect('task/all');
    }
    public function removeAssignee(Request $request, Task $task)
    {
    	$task=Task::find($task->id);
    	$task->users()->detach($request->assignee);
    	return redirect('task/all');
    }    
}
