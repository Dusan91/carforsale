@extends('layouts.admin')

@section('content')
	
	<h1 class="naslovi">Create Advert</h1>

	


{!! Form::open(['method'=>'POST','action'=>'AdminAdvertController@store','files'=>true]) !!}
	<div class="form-group">
		{!! Form::label('title','Car:') !!}
		{!! Form::text('title',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('body','Description:') !!}
		{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('category_id','Category:') !!}
		{!! Form::select('category_id',[''=>'Choose Category'] + $categories,null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('price','Price(EUR):') !!}
		{!! Form::text('price',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('driven','Mileage(KM):') !!}
		{!! Form::text('driven',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('yop','Year:') !!}
		{!! Form::text('yop',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('city','City:') !!}
		{!! Form::text('city',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('cubic_capacity','cCM:') !!}
		{!! Form::text('cubic_capacity',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('fuel','Fuel:') !!}
		{!! Form::text('fuel',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('registered','Registered:') !!}
		{!! Form::date('registered',null,['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('phone','Phone Number:') !!}
		{!! Form::text('phone',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('photo_id','Photo:') !!}
		{!! Form::file('photo_id')!!}
	</div>

	<h1>More Info</h1>
	
	<div class="form-group">
		{!! Form::label('transmission','Transmission:') !!}
		{!! Form::text('transmission',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('nofs','Number of Seats:') !!}
		{!! Form::text('nofs',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('ac','Air Conditioner') !!}
		{!! Form::text('ac',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('color','Color:') !!}
		{!! Form::text('color',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('damage','Damage:') !!}
		{!! Form::text('damage',null,['class'=>'form-control']) !!}
	</div>

	

	<div class="form-group">
		{!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

	

@stop




@section('styles')
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('scripts')
		
	<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js' ></script>

@stop