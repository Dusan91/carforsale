@extends('layouts.advert')

@section('content')
<div style="padding: 50px;border: 2px solid black">
@if($messages)
	<h1>Messages</h1>	
		<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Author</th>
		        <th>Email</th>
		        <th>Body</th>
		        <th>See Message</th>
		        <th>Recived</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($messages as $message)
		      <tr>
		        <td>{{$message->author}}</td>
		        <td>{{$message->email}}</td>
		        <td>{{str_limit($message->body,20)}}</td>
		        <td><a class="btn btn-info btn-lg" href="{{route('home.message.show',$message->id)}}">See</span></a></td>
		        <td>{{$message->created_at->diffForHumans()}}</td>
		        <td>
		        {!! Form::open(['method'=>'DELETE','action'=>['MessagesController@destroy',$message->id]]) !!}
					<div class="form-group">
						{!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
					</div>
				{!! Form::close() !!}
		        </td>
		      </tr>	

		    @endforeach
		    </tbody>
		  </table>
@endif


@if($sender_messages)
	<h1>Sent Messages</h1>	
		<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>To</th>
		        <th>Email</th>
		        <th>Body</th>
		        <th>See Message</th>
		        <th>Recived</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($sender_messages as $sender_message)
		      <tr>
		        <td>
			        @foreach($allusers as $user)
			        	@if($user->id == $sender_message->receiver_id)
			        		{{$user->name}}
			        	@endif
			        @endforeach
		        </td>
		        <td>
			        @foreach($allusers as $user)
			        	@if($user->id == $sender_message->receiver_id)
			        		{{$user->email}}
			        	@endif
			        @endforeach
		        </td>
		        <td>{{str_limit($sender_message->body,20)}}</td>
		        <td><a class="btn btn-info" href="{{route('home.message.show',$sender_message->id)}}">See</a></td>
		        <td>{{$sender_message->created_at->diffForHumans()}}</td>
		        <td>
		        {!! Form::open(['method'=>'DELETE','action'=>['MessagesController@destroy',$sender_message->id]]) !!}
					<div class="form-group">
						{!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
					</div>
				{!! Form::close() !!}
		        </td>
		      </tr>	
		    @endforeach
		    </tbody>
		  </table>
@endif








<a href="{{route('home.message.create')}}" class="btn btn-primary">Send New Message</a>
</div>


@stop