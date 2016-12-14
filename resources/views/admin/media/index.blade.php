@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_photo'))
  <p class="bg-danger" style="width: 190px;
">{{session('deleted_photo')}}</p>
@endif

<h1 class="naslovi">Photos</h1>


@if($photos)
	
	<table class="table table-bordered">
	      <tr>
	        <th>ID</th>
	        <th>Photo</th>
	        <th>Name</th>
	        <th>Delete</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($photos as $photo)	
	      <tr>
	        <td>{{$photo->id}}</td>
	        <td><img width="200px" height="200px" src="{{$photo->file}}"></td>
	        <td>{{$photo->file}}</td>
	        <td>
	        	{!! Form::open(['method'=>'DELETE','action'=>['AdminPhotoController@destroy',$photo->id]]) !!}
	        		
	        		<div class="form-group">
	        			{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
	        		</div>
	        	{!! Form::close() !!}
	        </td>
	      </tr>
	    @endforeach

	    </tbody>
	  </table>
@endif

@stop