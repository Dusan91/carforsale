@extends('layouts.advert')

@section('styles')
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('content')

	<h1 class="naslovi">Upload Photos</h1>
	{!! Form::model($advert,['method'=>'PUT','action'=>['AdminPhotoController@update',$advert->id],'files'=>true]) !!}
	<div class="form-group">
		{!! Form::label('advert_id','Photos:') !!}
		{!! Form::file('advert_id[]',array('multiple'=>true)) !!}
	</div>
		<div class="form-group">
		{!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}

@stop


@section('scripts')
		
	<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js' ></script>

@stop