<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	App::setLocale('en');
    return view('welcome');
});

Route::get('/de', function () {
	App::setLocale('de');
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Admin routes
 Route::group(['middleware' => 'admin'], function () {

	Route::get('project/create', function(){
		return view('project.create');
	})->name('create-project');

	Route::post('project/store', 'ProjectController@store');
	
	Route::get('project/edit/{project}', function(App\Project $project){
		return view('project.edit')->with('project', $project);
	})->name('edit-project');

	Route::post('project/update/{project}', 'ProjectController@update');

	Route::get('project/delete/{project}', 'ProjectController@delete');

	Route::get('task/create/{project}', function(App\Project $project){
		return view('task.create')->with('project', $project);
	})->name('create-task');

	Route::post('task/store/{project}', 'TaskController@store')->name('task-store');

	Route::get('task/edit/{task}', function(App\Task $task){
		return view('task.edit')->with('task', $task);
	})->name('edit-task');
	Route::post('task/update/{task}', 'TaskController@update' );
	Route::get('task/delete/{task}', 'TaskController@delete');

});

Route::get('project/list', function(){
	$projects=App\Project::all();
	return view('project.list')->with('projects', $projects);
})->name('list-project');

Route::get('project/detail/{project}', function(App\Project $project){
	return view('project.detail')->with('project', $project);
})->name('project-detail');

  //Route::get('task/list/{project?}', 'TaskController@listTasks');
 Route::get('task/list/{project}', function(App\Project $project){
 		$tasks=$project->tasks;
 	return view('task.list')->with('tasks', $tasks);
 })->name('task-list');
 Route::get('task/all', function(){
 	$tasks=App\Task::all();
 	//print_r($tasks->toArray()); exit();
 	return view('task.list')->with('tasks', $tasks);
 });
 Route::get('task/detail/{task}', function(App\Task $task){
 	return view('task.detail')->with('task', $task);
 });
 Route::get('task/{task}/assign', function(App\Task $task){
 	$users=App\User::all();

 	return view('task.assign')->with('users', $users);
 });
 Route::post('task/{task}/assign', 'TaskController@assign');

 Route::get('task/{task}/remove/assignee', function(App\Task $task){

 	return view('task.removeAssignee')->with('task', $task);

 });
 Route::post('task/{task}/remove/assignee', 'TaskController@removeAssignee');

 Route::get('check/locale/en', function(){
 	App::setLocale('en');
 	 
	return trans('message.welcome');
 });

  Route::get('check/locale/de', function(){
 	App::setLocale('de');
 	 
	return trans('message.welcome');
 });
