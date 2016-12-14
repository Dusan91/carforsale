@extends('layouts.admin')

@section('content')
	
@if(Session::has('created_adv'))
  <p class="bg-primary" style="width: 190px;
">{{session('created_adv')}}</p>
@endif
@if(Session::has('updated_adv'))
  <p class="bg-info" style="width: 190px;
">{{session('updated_adv')}}</p>
@endif
@if(Session::has('deleted_adv'))
  <p class="bg-danger" style="width: 190px;
">{{session('deleted_adv')}}</p>
@endif

<h1 class="naslovi">Adverts</h1>

@if(count($adverts) == 1)
  <h4 class="naslovi">1 Advert</h4>
  @elseif(count($adverts) > 1)
  <h4 class="naslovi">{{count($adverts)}} adverts</h4>
@endif

	<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>ID</th>
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
	        <th>Add More Photos</th>
	        <th>See Advert</th>
	        <th>Delete</th>
	      </tr>
	    </thead>
	    <tbody>
	    @if($adverts)
	    	@foreach($adverts as $advert)
	    		@if($advert->created_at->diffForHumans() < ('15 seconds ago'))
			      <tr style="background-color: red;">
			        <td>{{$advert->id}}</td>
			        <td><img height="50" src="{{$advert->photo ? $advert->photo->file :'/images/ph.png'}}"></td>
			        <td>{{$advert->user->name}}</td>
			        <td>{{$advert->category ? $advert->category->name : 'Uncatorized'}}</td>
			        <td><a class="btn btn-info" href="{{route('admin.advert.edit',$advert->id)}}">{{$advert->title}}</a></td>
			        <td>{{str_limit($advert->body,25)}}</td>
			        <td>{{$advert->price}}</td>
			        <td>{{$advert->driven}}</td>
			        <td>{{$advert->yop}}</td>
			        <td>{{$advert->registered}}</td>
			        <td>{{$advert->cubic_capacity}}</td>
			        <td>{{$advert->fuel}}</td>
			        <td>{{$advert->city}}</td>
			        <td>{{$advert->phone}}</td>
			        <td><a class="btn btn-primary" href="{{route('admin.media.edit',$advert->id)}}">+</a></td>
			        <td><a class="btn btn-primary" href="{{route('advert',$advert->id)}}">See</a></td>
			        
			        <td>
			        {!! Form::open(['method'=>'DELETE','action'=>['AdminAdvertController@destroy',$advert->id]]) !!}
					<div class="form-group">
						{!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
					</div>
					{!! Form::close() !!}
					</td>
			      </tr>
		      @else
		       <tr>
		        <td>{{$advert->id}}</td>
		        <td><img height="50" src="{{$advert->photo ? $advert->photo->file :'/images/ph.png'}}"></td>
		        <td>{{$advert->user->name}}</td>
		        <td>{{$advert->category ? $advert->category->name : 'Uncatorized'}}</td>
		        <td><a class="btn btn-info" href="{{route('admin.advert.edit',$advert->id)}}">{{$advert->title}}</a></td>
		        <td>{{str_limit($advert->body,25)}}</td>
		        <td>{{$advert->price}}</td>
		        <td>{{$advert->driven}}</td>
		        <td>{{$advert->yop}}</td>
		        <td>{{$advert->registered}}</td>
		        <td>{{$advert->cubic_capacity}}</td>
		        <td>{{$advert->fuel}}</td>
		        <td>{{$advert->city}}</td>
		        <td>{{$advert->phone}}</td>
		        <td><a class="btn btn-primary" href="{{route('admin.media.edit',$advert->id)}}">+</a></td>
		        <td><a class="btn btn-primary" href="{{route('advert',$advert->id)}}">See</a></td>
		        
		        <td>
		        {!! Form::open(['method'=>'DELETE','action'=>['AdminAdvertController@destroy',$advert->id]]) !!}
				<div class="form-group">
					{!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
				</div>
				{!! Form::close() !!}
				</td>
		      </tr>
		      @endif

	    	@endforeach
	    @endif
	    </tbody>
	   
	  </table>


@stop