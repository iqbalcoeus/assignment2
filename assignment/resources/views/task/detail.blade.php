@extends('layouts.app')
@section('content')
<div class="panel panel-default panel-fanarea-green">
	<div class="panel-heading">
		<h3 class="panel-title">Task Details</h3>
	</div>
	<article class="group-detail-article article-image">
		<div class="panel-body">
			<div class="row">
				<label class="col-md-2">Task Name:</label> 
				<p class="col-md-10"> {{$task->title}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">Created Date:</label>
				<p class="col-md-10"> {{$task->created_at}} </p>
			</div>
			<div class="row" >
				<label class="col-md-2">Updated Date:</label>
				<p class="col-md-10"> {{$task->updated_at}} </p>
			</div>
			<div class="row" >
				<label class="col-md-2">status:</label>
				<p class="col-md-10"> {{$task->status}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">Category:</label>
				<p class="col-md-10"> {{$task->category}} </p>
			</div>
			<div class="row">
				<label class="col-md-2">Description</label>
				<p class="col-md-10"> {{$task->description}} </p>
			</div>
			<div class="row">
				<a href=" {{url('task/'.$task->id.'/assign')}} "><label class="col-md-2">Assignee</label> </a>
				@foreach($task->users as $user)
				<p class="col-md-1"> {{ $user->name }} </p>
				@endforeach
				<a href=" {{url('task/'.$task->id.'/remove/assignee')}} "><label class="col-md-2">Remove Assignee</label> </a>
			</div>
	</article>
</div>
@endsection