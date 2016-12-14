@extends('layouts.admin')

@section('content')

	{!! Form::open(['method'=>'PATCH','action'=>'MessagesController@store','files'=>true]) !!}
	<input type="hidden" name="email" value="{{Auth::user()->email}}">

	<div class="form-group">
		{!! Form::label('user_id','To:') !!}
		{!! Form::select('user_id',array(''=>'Choose User') + $users,null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body','Body:') !!}
		{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Send ',['class'=>'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@stop

