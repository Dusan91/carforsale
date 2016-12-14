@extends('layouts.admin')

@section('content')
@if($replies)
	<h1 class="naslovi">Odgovori</h1>
  <h3 class="naslovi">Komentar</h3>
  
 

    <p class="naslovi"> {{$comment->body}} </p>
  
    
  

<table class="table table-bordered ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Approve/Unapprove</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($replies as $reply)
      <tr>
        <td>{{$reply->id}}</td>
        <td>{{$reply->author}}</td>
        <td>{{$reply->email}}</td>
        <td>{{$reply->body}}</td>
        <th>{{$reply->created_at}}</th>
        <td>
          @if($reply->is_active == 1)
        {!! Form::open(['method'=>'PATCH','action'=>['AdminCommentRepliesController@update',$reply->id]]) !!}
            <input type="hidden" name="is_active" value="0">
            <div class="form-group">
              {!! Form::submit('Unapprove',["class"=>"btn btn-info"]) !!}
            </div>
        {!! Form::close() !!}
      @else

        {!! Form::open(['method'=>'PATCH','action'=>['AdminCommentRepliesController@update',$reply->id]]) !!}
            <input type="hidden" name="is_active" value="1">
            <div class="form-group">
              {!! Form::submit('Approve',["class"=>"btn btn-primary"]) !!}
            </div>
        {!! Form::close() !!}
        
          @endif
        </td>
        <td>
          {!! Form::open(['method'=>'DELETE','action'=>['AdminCommentRepliesController@destroy',$reply->id]]) !!}
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
@endif

@stop