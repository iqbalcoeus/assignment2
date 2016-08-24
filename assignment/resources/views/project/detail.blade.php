@extends('layouts.app')
@section('content')
<div class="panel panel-default panel-fanarea-green">
	<div class="panel-heading">
		<h3 class="panel-title">Project Details</h3>
	</div>
	<article class="group-detail-article article-image">
		<div class="panel-body">
			<div class="row">
				<label class="col-md-2">Project Title:</label> 
				<p class="col-md-10"> {{$project->title}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">Created Date:</label>
				<p class="col-md-10"> {{$project->created_at}} </p>
			</div>
			<div class="row" >
				<label class="col-md-2">Updated Date:</label>
				<p class="col-md-10"> {{$project->updated_at}} </p>
			</div>
			<div class="row" >
				<label class="col-md-2">status:</label>
				<p class="col-md-10"> {{$project->status}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">Category:</label>
				<p class="col-md-10"> {{$project->category}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">Description</label>
				<p class="col-md-10"> {{$project->description}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">	Project's Tasks:</label>
				<a href="{{ url('/task/list/'.$project->id) }}" class="col-md-10">See All</a>

			</div>
			<a href="{{ url('/task/create/'.$project->id) }}" class="col-md-10">Create New Task</a>
		</div>
	</article>
</div>
@endsection