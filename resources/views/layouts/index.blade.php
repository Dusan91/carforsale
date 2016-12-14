<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CarForSale</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
     <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="css/1-col-portfolio.css" rel="stylesheet">
</head>
<body style="background-image:url('/images/background/car.jpg');margin: 0px 250px;">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="
    margin: 0 250px;
    height: 100px;
    background-color: black;
    ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand active" href="/"><img src="../images/logo.jpg" style="
                    width: 150px;
                    height: 80px;
                    margin-left: -110px;
                "></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            @if(Auth::user())  
                <ul class="nav navbar-nav" style="
                    padding-top: 50px;
                ">
                    
                    @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{url('/admin')}}">Admin</a>
                    </li>
                    <li><a href="{{route('admin.advert.create')}}">Create Advert</a></li>
                    @endif
                    @if(Auth::user()->isAuthor())
                        <li><a href="{{route('author.create')}}">Create Advert</a></li>
                    @endif
                </ul>
            @endif

                <ul class="nav navbar-nav navbar-right" style="
                    padding-top: 50px;
                ">
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
                        @if($messages)
                          <li>Received Messages</li>
                        @foreach($messages as $message)
                            <li><a href="{{route('home.message.show',$message->id)}}">From:  {{$message->author}}</a></li>
                        @endforeach
                        @endif
                        <li role="separator" class="divider"></li>
                        @if($sender_messages)                            
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
                        @endif

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
                </ul>
               
            </div>
    </nav>
    <div class="container" style="
    background-color:white;
    padding-top: 45px;
    ">
    <div class="pull-left">
        @yield('categories')
    </div>
    <div  style="padding-top: 70px;   " >
       @yield('content')
    </div>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; DusanM. 2016</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
