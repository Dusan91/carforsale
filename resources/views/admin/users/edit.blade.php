@extends ('layouts.admin')

@section('content')
	<h1 class="naslovi">Update User</h1>

<div class="row">
	<div class="col-sm-3">
		<img src="{{$user->photo ? $user->photo->file : '/images/ph.png'}}" alt="" class="img-responsive img-rounded">
	</div>

	<div class="col-sm-9">

		{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('name','Name:') !!}
				{!! Form::text('name',null,['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email',null,['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('role_id','Role:') !!}
				{!! Form::select('role_id',$roles ,null,['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('is_active','Status:') !!}
				{!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),null,['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('photo_id','Photo:') !!}
				{!! Form::file('photo_id')!!}
			</div>

			<div class="form-group">
				{!! Form::label('password','Password:') !!}
				{!! Form::password('password',['class'=>'form-control']) !!}
			</div>
		
			<div class="form-group">
				{!! Form::submit('Update',["class"=>"btn btn-primary col-sm-6",'style'=>'width: 130px;']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
			
			<div class="form-group" >
				{!! Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width: 130px;margin-left: 30px;']) !!}
			</div>
		{!! Form::close() !!}
</div>
</div>






@stop

