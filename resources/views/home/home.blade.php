@extends('layouts.index')

@section('content')
	 <!-- Project One -->
	 @foreach($adverts as $advert)
	 
        <div class="row">
            <div class="col-md-9">
                <a href="{{route('advert',$advert->slug)}}">
                    <img style="
                            box-shadow: 10px 10px 5px #888888;
                            margin-left: 145px;
                            height: 550px;
                    " width="500px"  class="img-responsive" src="{{$advert->photo->file}}" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <h3>{{$advert->title}}</h3>
                <h4>{{$advert->price}}(EUR)</h4>
                <p>{{str_limit($advert->body,100)}}</p>
                <a class="btn btn-primary" href="{{route('advert',$advert->slug)}}">View Car <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>



	 @endforeach

     <div class="row"><div class="col-sm-6 col-sm-offset-5">
                {{$adverts->render()}}
             </div></div>

@stop

@section('categories')
    @foreach($categories as $category)

        <a href="{{route('category',$category->id)}}" class="btn btn-info">{{$category->name}}</a>
        
    @endforeach
@stop

@section('navbar')
    
@stop