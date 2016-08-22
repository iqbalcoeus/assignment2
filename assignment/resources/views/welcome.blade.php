@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                @lang('message.welcome_heading')
                </div>

                <div class="panel-body">
                   @lang('message.welcome');
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
