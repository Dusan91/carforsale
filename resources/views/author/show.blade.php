@extends('layouts.advert')

@section('content')

<div style="padding: 50px;">
	<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Add More Photos</th>
	        <th>Photo</th>
	        <th>Owner</th>
	        <th>Category</th>
	        <th>Car</th>
	        <th>Description</th>
	        <th>Price(EUR)</th>
	        <th>Odometer(KM)</th>
	        <th>Year</th>
	        <th>Registered</th>
	        <th>cCM</th>
	        <th>Fuel</th>
	        <th>City</th>
	        <th>Phone Number</th>
	        <th>Delete</th>
	      </tr>
	    </thead>
	    <tbody>
		      <tr>
		        <td>{{$advert->id}}</td>
		        <td><a class="btn btn-primary" href="{{route('admin.media.edit',$advert->id)}}">+</a></td>
		        <td><img height="50" src="{{$advert->photo ? $advert->photo->file :'/images/ph.png'}}"></td>
		        <td>{{$advert->user->name}}</td>
		        <td>{{$advert->category ? $advert->category->name : 'Uncatorized'}}</td>
		        <td>{{$advert->title}}</td>
		        <td>{{str_limit($advert->body,25)}}</td>
		        <td>{{$advert->price}}</td>
		        <td>{{$advert->driven}}</td>
		        <td>{{$advert->yop}}</td>
		        <td>{{$advert->registered}}</td>
		        <td>{{$advert->cubic_capacity}}</td>
		        <td>{{$advert->fuel}}</td>
		        <td>{{$advert->city}}</td>
		        <td>{{$advert->phone}}</td>
		        
		        <td>
		        {!! Form::open(['method'=>'DELETE','action'=>['AuthorController@destroy',$advert->id]]) !!}
				<div class="form-group">
					{!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
				</div>
				{!! Form::close() !!}
				</td>
		      </tr>
	    </tbody>
	   
	  </table>

	  <a class="btn btn-primary" href="/">CONTINUE</a>

	  </div>


@stop