<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Project;
use App\User;
use App\Task;
class ProjectsTest extends TestCase
{
	//use WithoutMiddleware;
	public function testListOfProjectPage()
	{
		$projects=Project::all();
		$this->visit('project/list')
			->see('List Of All Projects');
		foreach ($projects as $project) 
		{
			$this->see($project->title);
		}
	}

	public function testLinkToDetailProjectPage()
	{
		$project=Project::first();

		$this->visit('project/list')
			->click($project->id)
			->seePageIs('project/detail/'.$project->id);
	}

	public function testProjectDetailPage()
	{
		$project=Project::first();

		$this->visit('project/detail/'.$project->id)
			->see($project->title)
			->see($project->description)
			->see($project->status)
			->see($project->category);
	}

	public function testLinkSeeAllTasks()
	{
		$project=Project::first();
		$this->visit('project/detail/'.$project->id)
			->click('See All')
			->seePageIs('task/list/'.$project->id);
	}

	public function testLinkCreateNewTask()
	{
		$user=User::first();
		$project=Project::first();
		$this->visit('project/detail/'.$project->id)
			->click('Create New Task')
			->seePageIs('/task/create/'.$project->id);
	}
	
	public function testLinkCreateNewProject()
	{
		$this->visit('/')
			->click('Add New Project')
			->seePageIs('/project/create');
	}

	public function testCreateNewProjectForm()
	{
		$title = str_random(10);
		$des = str_random(40);
		$this->visit('project/create')
			->type($title, 'title')
			->type($des, 'description')
			->press('Create')
			->seeInDatabase('projects', ['title' => $title, 'description' => $des]);
	}
	
	// public function testDeleteProject()
	// {
	// 	$project=Project::first();

	// 	$this->visit('project/list')
	// 		->click('Delete')
	// 		->notSeeInDatabase('projects', ['id' => $project->id]);
	// }
	
	public function testLinkEditProjectPage()
	{
		$project=Project::first();

		$this->visit('project/list')
			->click('Edit')
			->seePageIs('project/edit/'.$project->id);
	}
	public function testProjectEditForm()
	{
		$project=Project::first();

		$title=str_random(10);
		$des=str_random(55);

		$this->visit('project/edit/'.$project->id)
			->type($title, 'title')
			->type($des, 'description')
			->select('In Progress', 'status')
			->press('Update')
			->seeInDatabase('projects', ['title' => $title, 'description' => $des, 'status' => 'In Progress']);
	}
}
