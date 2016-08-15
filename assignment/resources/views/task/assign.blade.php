@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add an assignee</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

					    <div class="form-group">
					      <label class="col-md-4 control-label" for="category">Choose user</label>
					      <div class="col-md-6">
						      <select class="form-control col-md-6" id="assignee" name="assignee">
						        @foreach($users as $index=> $user)
						        <option value="{{$user->id}}"> {{$user->name}} </option>
						        @endforeach
						      </select>
					      </div>
					     
					    </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> assign
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