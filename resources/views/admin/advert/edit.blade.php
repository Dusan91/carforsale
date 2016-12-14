@extends('layouts.admin')

@section('content')

<h1 class="naslovi">Update Advert</h1>


	<div class="row">

		<div class="col-sm-3">
			<img src="{{$advert->photo ? $advert->photo->file : 'No Picture to show'}}" alt="" class="img-responsive">
			
		</div>

		<div class="col-sm-9">

	
		{!! Form::model($advert,['method'=>'PUT','action'=>['AdminAdvertController@update',$advert->id],'files'=>true]) !!}
			<div class="form-group">
		{!! Form::label('title','Car:') !!}
		{!! Form::text('title',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('body','Description:') !!}
		{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('category_id','Category:') !!}
		{!! Form::select('category_id',[''=>'Choose Category'] + $categories,null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('price','Price(EUR):') !!}
		{!! Form::text('price',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('driven','Odometer(KM):') !!}
		{!! Form::text('driven',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('yop','Year:') !!}
		{!! Form::text('yop',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('city','City:') !!}
		{!! Form::text('city',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('cubic_capacity','cCM:') !!}
		{!! Form::text('cubic_capacity',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('fuel','Fuel:') !!}
		{!! Form::text('fuel',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('registered','Registered:') !!}
		{!! Form::date('registered',null,['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('phone','Phone Number:') !!}
		{!! Form::text('phone',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('photo_id','Photo:') !!}
		{!! Form::file('photo_id')!!}
	</div>

	<div class="form-group">
		{!! Form::label('transmission','Transmission:') !!}
		{!! Form::text('transmission',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('nofs','Number of Seats:') !!}
		{!! Form::text('nofs',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('ac','Air Conditioner') !!}
		{!! Form::text('ac',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('color','Color:') !!}
		{!! Form::text('color',null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('damage','Damage:') !!}
		{!! Form::text('damage',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
	</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE','action'=>['AdminAdvertController@destroy',$advert->id]]) !!}
		
			<div class="form-group">
				{!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-2']) !!}
			</div>
		{!! Form::close() !!}
	
		</div> 

		

	</div>

	
@stop