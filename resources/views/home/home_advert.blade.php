@extends('layouts.advert')

@section('content')
    <div class="container" style="padding-top: 10px">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$advert->title}}
                    <small>Price: {{$advert->price}}(EUR)</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <img style="
                    box-shadow: 10px 10px 5px #888888;
                    width: 600px;
                    height: 700px;
                " class="img-responsive" src="{{$advert->photo->file}}" alt="">
                <div class="row" >
                    @if($photos)
                    <div class="col-lg-12">
                        <h3 class="page-header">Other Images</h3>
                    </div> 
                    @foreach($photos as $photo)
                        <div class="col-sm-3 col-xs-6">
                            <a href="{{$photo->file}}">
                                <img style="height: 150px; width: 150px;"  class="img-responsive" src="{{$photo->file}}" alt="">
                            </a>
                        </div>  
                     @endforeach
                     @endif
                </div>
            </div>
            <div class="col-md-4" style="
            box-shadow: 10px 10px 10px 10px #888888;
            ">
                <h3>{{$advert->title}}</h3>
                <h3>Car Details</h3>
                <ul>
                    <li>Owner:   {{$advert->user->name}}</li>
                    <li>Price:   {{$advert->price}}  (EUR)</li>
                    <li>Odometer:   {{$advert->driven}}  (KM)</li>
                    <li>Year:   {{$advert->yop}}</li>
                    <li>Registered:   {{$advert->registered}}</li>
                    <li>cCM:   {{$advert->cubic_capacity}}</li>
                    <li>Fuel:   {{$advert->fuel}}</li>
                    <li>City:   {{$advert->city}}</li>
                    <li>Phone Number:   {{$advert->phone}}</li>
                    <li>Email:   <a href="">{{$advert->user->email}}</a></li>
                    <hr>
                </ul>
                <h3>More Info</h3>
                <ul>
                    <li>Transmission:   {{$advert->transmission}} gears</li>
                    <li>Number Of Seats:   {{$advert->nofs}} seats</li>
                    <li>Air Conditioner:   {{$advert->ac}}</li>
                    <li>Color:   {{$advert->color}}</li>
                    <li>Damage:   {{$advert->damage}}</li>
                </ul>
                    <hr>
                    <h3>Description</h3>
                    <p>{{$advert->body}}</p>
            </div>
        </div>
         <hr>
         @if(Auth::user())
            @if(count($comments)>0) 
               @foreach($comments as $comment)           
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width="70px" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at}}</small> 
                        </h4>
                        {{$comment->body}}
                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img height="56" width="56" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                        {!! Form::open(['method'=>'POST','action'=>'AdminCommentRepliesController@store']) !!}
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                            <div class="form-group">
                                {!! Form::label('body',' ') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1,'style'=>'height:40px;width:500px;']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Reply',["class"=>"btn btn-primary"]) !!}
                            </div>
                        {!! Form::close() !!}
                </div>
                </div>
                @endforeach
                @endif
                 <hr>
        <div class="well">
                    <h4>Post Comment</h4>
                    {!! Form::open(['method'=>'POST','action'=>'AdminCommentsController@store']) !!}
                    <input type="hidden" name="advert_id" value="{{$advert->id}}">
                        <div class="form-group" >
                            {!! Form::label('body',' ') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control','style'=>'height:40px;width:500px;']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Ask ',['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
        </div>
                <hr>
        @else
             <p>Login or register for comments</p>                
        @endif
        <hr>
    </div>

@stop

@section('navbar')
    @if(Auth::user())  
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">{{Auth::user()->name}}
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li>
                                <img src="{{Auth::user()->photo->file}}" style="
                                        height: 95px;
                                        width: 95px;
                                        margin-left: 35px;
                                ">
                            </li>
                            <li style="text-align:center;">{{Auth::user()->role->name}}</li>
                          <li>Received Messages</li>
                        @foreach($messages as $message)
                            <li><a href="{{route('home.message.show',$message->id)}}">From:  {{$message->author}}</a></li>
                        @endforeach
                        <li role="separator" class="divider"></li>
                            <li>Sent Messages</li>
                        @foreach($sender_messages as $smessage)
                            <li><a href="{{route('home.message.show',$smessage->id)}}">To:   
                                @foreach($allusers as $user)
                                @if($user->id == $smessage->receiver_id)
                                    {{$user->name}}
                                @endif
                                @endforeach
                            </a></li>
                        @endforeach

                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('home.message.create')}}">Send New Message</a></li>
                            <li><a href="{{route('home.message.index')}}">All  Messages</a></li>
                            <li><a href="{{url('/logout')}}">Logout</a></li>
                          </ul>
                        </div>
                    </li> 
                @else
                <li class="pull-right active"><a href="{{url('/login')}}">Login</a></li>
                <li class="pull-right active"><a href="{{url('/register')}}">Register</a></li>
                @endif
@stop