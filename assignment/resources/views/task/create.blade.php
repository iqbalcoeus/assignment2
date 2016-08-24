@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new Task</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/task/store/'.$project->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type='text' class="form-control" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
					      <label class="col-md-4 control-label" for="status">Status</label>
					      	<div class="col-md-6">
						      <select class="form-control " id="status" name="status">
						        <option>New</option>
						        <option>In Progress</option>
                                <option>Done</option>
                                <option>Feedback</option>
                                <option>Re-open</option>
						      </select>
						  	</div>
					    </div>
					    <div class="form-group">
					      <label class="col-md-4 control-label" for="category">Category</label>
					      <div class="col-md-6">
						      <select class="form-control col-md-6" id="category" name="category">
						        <option>Front-end</option>
						        <option>Back-end</option>
						        <option>Front-end + Back-end</option>
						        <option>Other</option>
						      </select>
					      </div>
					     
					    </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection