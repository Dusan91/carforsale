@extends('layouts.advert')

@section('content')
<div class="container" style="padding-top: 50px">

	{!! Form::open(['method'=>'POST','action'=>'MessagesController@store','files'=>true]) !!}
	<input type="hidden" name="email" value="{{Auth::user()->email}}">
	<input type="hidden" name="author" value="{{Auth::user()->name}}">
	<input type="hidden" name="photo" value="{{Auth::user()->photo}}">
	<input type="hidden" name="sender_id" value="{{Auth::user()->id}}">	
	<div class="form-group">
		{!! Form::label('receiver_id','To:') !!}
		{!! Form::select('receiver_id',$users,null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body','Body:') !!}
		{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Send ',['class'=>'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

</div>

@stop

