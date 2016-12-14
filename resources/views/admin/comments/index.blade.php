@extends('layouts.admin')

@section('content')
@if(count($comments)>0)

<h1 class="naslovi">Comments</h1>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Email</th>
        <th>Description</th>
        <th>Advert</th>
        <th>Replies</th>
        <th>Approve/Unapprove</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->body}}</td>
        <td><a  class="btn btn-info" href="{{route('advert',$comment->advert->slug)}}"> See Advert</a></td>
        <td><a class="btn btn-info" href="{{route('admin.replies.show',$comment->id)}}"> See Replies</a></td>
        <td>
        	@if($comment->is_active == 1)
				{!! Form::open(['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id]]) !!}
						<input type="hidden" name="is_active" value="0">
						<div class="form-group">
							{!! Form::submit('Unapprove',["class"=>"btn btn-info"]) !!}
						</div>
				{!! Form::close() !!}
			@else

				{!! Form::open(['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id]]) !!}
						<input type="hidden" name="is_active" value="1">
						<div class="form-group">
							{!! Form::submit('Approve',["class"=>"btn btn-primary"]) !!}
						</div>
				{!! Form::close() !!}
				
        	@endif
        </td>

        <td>
        	{!! Form::open(['method'=>'DELETE','action'=>['AdminCommentsController@destroy',$comment->id]]) !!}
						<input type="hidden" name="is_active" value="1">
						<div class="form-group">
							{!! Form::submit('Delete',["class"=>"btn btn-danger"]) !!}
						</div>
				{!! Form::close() !!}
        </td>

      </tr>
    @endforeach
    </tbody>
 </table>
@else
<h1 class="text-center">There Is No Comments</h1>
@endif
@stop