@extends('layouts.admin')

@section('content')
<!-- 	<h1>Kategorije</h1>
 -->
@if(Session::has('created_cat'))
  <p class="bg-primary" style="width: 190px;
">{{session('created_cat')}}</p>
@endif
@if(Session::has('updated_cat'))
  <p class="bg-info" style="width: 190px;
">{{session('updated_cat')}}</p>
@endif
@if(Session::has('deleted_cat'))
  <p class="bg-danger" style="width: 190px;
">{{session('deleted_cat')}}</p>
@endif



<div class="panel panel-default" style="width: 350px;">
  <!-- Default panel contents -->
  <div class="panel-heading">Categories</div>
 

	@if($categories)
	<table class="table table-bordered "  style=" width: 350px;">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Delete</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($categories as $category)
	      <tr>
	        <td>{{$category->id}}</td>
	        <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
	        <td>
	        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
					<div class="form-group">
						{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					</div>
			{!! Form::close() !!}
	        </td>
	      </tr>
	     @endforeach
	    </tbody>
	  </table>
		
	</div>
	@endif

	{!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
		<div class="form-group" style="width: 350px;">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	
@stop