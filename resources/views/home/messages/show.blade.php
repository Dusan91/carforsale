@extends('layouts.advert')

@section('content')

<div class="container" style="padding:50px;background-color: white;border: 2px solid black;">

	
		
	<div style="margin-top: -18px;">
			<h1 style="font-size: 20px;"><img style="width:45px" src="{{$message->photo}}"> {{$message->author}}---
			 @foreach($users as $user)
				@if($user->name == $message->author)
					{{$user->role->name}}
				@endif
			@endforeach
			<small>{{$message->email}}</small></h1>
			
			<br>
			<p style="margin-top:-30px">{{$message->body}}</p>
			<hr>
			
		</div>

	

		@foreach($replies as $reply)
                <div style="margin-top: -18px;">
					<h1 style="font-size: 20px;"><img style="width:45px" src="{{$reply->photo}}"> {{$reply->author}}---
					 @foreach($users as $user)
						@if($user->name == $message->author)
							{{$user->role->name}}
						@endif
					@endforeach
					<small>{{$reply->email}}</small></h1>
					<br>
					<p style="margin-top:-30px">{{$reply->body}}</p>
					<hr>
					
				</div>
        @endforeach


</div>

<div class="container">
	<h1>Reply</h1>
	{!! Form::open(['method'=>'POST','action'=>'MsgRepliesController@store','files'=>true]) !!}
	<input type="hidden" name="email" value="{{Auth::user()->email}}">
	<input type="hidden" name="author" value="{{Auth::user()->name}}">
	<input type="hidden" name="photo" value="{{Auth::user()->photo}}">
	<input type="hidden" name="sender_id" value="{{Auth::user()->id}}">	
	<input type="hidden" name="receiver_id" value="{{$message->sender_id}}">	
	<input type="hidden" name="message_id" value="{{$message->id}}">	

	<div class="form-group">
		{!! Form::label('body','Body:') !!}
		{!! Form::text('body',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Reply ',['class'=>'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
</div>

@stop