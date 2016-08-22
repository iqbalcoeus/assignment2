<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Task;
class TasksTest extends TestCase
{

	public function testListOfTaskPage()
	{
		$tasks=Task::all();
		$this->visit('task/all')
			->see('List Of All tasks');
		foreach ($tasks as $task) 
		{
				$this->see($task->name);
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
			->see($task->name)
			->see($task->status)
			->see($task->category)
			->see($task->description);
	}

	
}
