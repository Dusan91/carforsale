@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
  <p class="bg-danger" style="width: 190px;
">{{session('deleted_user')}}</p>
@endif
@if(Session::has('created_user'))
  <p class="bg-primary" style="width: 190px;
">{{session('created_user')}}</p>
@endif
@if(Session::has('updated_user'))
  <p class="bg-info" style="width: 190px;
">{{session('updated_user')}}</p>
@endif

<h1 class="naslovi">Users</h1>

@if(count($users) == 1)
  <h4 class="naslovi">1 User</h4>
  @elseif(count($users) > 1)
  <h4 class="naslovi">{{count($users)}} Users</h4>
@endif


<table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
    @if($users)

    @foreach($users as $user)
      

      <tr>
        <td>{{$user->id}} </td>
        <td>
        <img height="50" src="{{$user->photo ? $user->photo->file : '/images/ph.png' }}" alt="">
        </td>
        <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>

        <td>{{$user->role ? $user->role->name : 'No info' }}</td>
        <!-- @if($user->role)
        <td>{{$user->role->name}}</td>
        @else
        <td><p>No Info</p></td>
        @endif -->
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>

        <!-- @if($user->is_active)
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
        @else
        <td><p>No Info</p></td>
        @endif -->
        
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
      
      @endif
    </tbody>
  </table>



@stop