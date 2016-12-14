@extends('layouts.admin')

@section('content')

<h1 class="naslovi">Create User</h1>

{!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
	<div class="form-group">
		{!! Form::label('name','Name:') !!}
		{!! Form::text('name',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email','Email:') !!}
		{!! Form::text('email',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('role_id','Role:') !!}
		{!! Form::select('role_id',$roles ,null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('photo_id','Photo:') !!}
		{!! Form::file('photo_id')!!}
	</div>
	<div class="form-group">
		{!! Form::label('password','Password:') !!}
		{!! Form::password('password',null,['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@include('includes.error')






@stop

