@extends('layouts.index')

@section('content')



 <h1>
    Category:{{$category->name}}
                </h1>
               @if($adverts)
 
	 @foreach($adverts as $advert)
	 
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img width="500px" class="img-responsive" src="{{$advert->photo->file}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$advert->title}}</h3>
                <h4>{{$advert->price}}(EUR)</h4>
                <p>{{str_limit($advert->body,100)}}</p>
                <a class="btn btn-primary" href="{{route('advert',$advert->id)}}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>
	 @endforeach

     <div class="row"><div class="col-sm-6 col-sm-offset-5">
                {{$adverts->render()}}
             </div></div>
              @endif


@stop








@section('categories')
<div style="padding-top:70px;">
    @foreach($categories as $category)

        <a href="{{route('category',$category->id)}}" class="btn btn-info">{{$category->name}}</a>
        
    @endforeach
    </div>
@stop