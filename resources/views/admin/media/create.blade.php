@extends('layouts.admin')

@section('styles')
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('content')

	<h1 class="naslovi">Upload Photo</h1>
	{!! Form::open(['method'=>'POST','action'=>'AdminPhotoController@store','class'=>'dropzone']) !!}
	
	{!! Form::close() !!}

@stop


@section('scripts')
		
	<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js' ></script>

@stop