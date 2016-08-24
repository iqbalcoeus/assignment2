<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Task;
use App\User;
use App\Project;
class TasksTest extends TestCase
{
	//use DatabaseMigrations;
	//use WithoutMiddleware;
	public function testListOfTaskPage()
	{
		$tasks=Task::all();
		$this->visit('task/all')
			->see('List Of All tasks');
		foreach ($tasks as $task) 
		{
				$this->see($task->title);
		}	

	}

	public function testLinkToDetailTaskPage()
	{
		$task=Task::first();
		$this->visit('task/all')
			->click($task->id)
			->seePageIs('task/detail/'.$task->id);
	}

	public function testDetailTaskPage()
	{
		$task=Task::first();
		$this->visit('task/detail/'.$task->id)
			->see($task->title)
			->see($task->status)
			->see($task->category)
			->see($task->description);
	}

	public function testLinkAssignee()
	{
		$task=Task::first();
		$this->visit('task/detail/'.$task->id)
			->click('Assignee')
			->seePageIs('task/'.$task->id.'/assign');
	}

	public function testAddAssigneeForm()
	{
		$task=Task::first();
		$user=User::inRandomOrder()->first();
		$this->visit('task/'.$task->id.'/assign')
			->select($user->id, 'assignee')
			->press('assign')
			->seeInDatabase('task_user', ['task_id' => $task->id, 'user_id' => $user->id]);

	}

	public function testLinkRemoveAssignee()
	{
		$task=Task::first();

		$this->visit('task/detail/'.$task->id)
			->click('Remove Assignee')
			->seePageIs('task/'.$task->id.'/remove/assignee');

	}

	public function testRemoveAssigneeForm()
	{
		$task=Task::first();
		$user=$task->users()->first();
	
		$this->visit('task/'.$task->id.'/remove/assignee')
			->select($user->id, 'assignee')
			->press('Remove')
			->notSeeInDatabase('task_user', ['task_id' => $task->id, 'user_id' => $user->id]);
	}

	public function testCreateNewTaskForm()
	{
		$project=Project::inRandomOrder()->first();
		$title= str_random(10);
		$des= str_random(50);
		$this->visit('task/create/'.$project->id)
			->type($title, 'title')
			->type($des, 'description')
			->select('New', 'status')
			->select('Front-end', 'category')
			->press('Create')
			->seeInDatabase('tasks', ['title' => $title, 'description' => $des]);
	}

	public function testLinkEditTask()
	{
		$task=Task::first();
		$this->visit('task/all')
			->click('Edit')
			->seePageIs('task/edit/'.$task->id);
	}

	public function testEditTaskForm()
	{
		$task=Task::inRandomOrder()->first();
		$title=str_random(10);

		$this->visit('task/edit/'.$task->id)
			->type($title, 'title')
			->select('In Progress', 'status')
			->press('Update')
			->seeInDatabase('tasks', ['title' => $title, 'status' => 'In Progress']);
	}

	public function testDeleteTask()
	{
		$task=Task::first();

		$this->visit('task/all')
			->click('Delete')
			->notSeeInDatabase('tasks', ['id' => $task->id]);
	}
}
