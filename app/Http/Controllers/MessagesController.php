<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Input;
use App\Message;
use App\User;
use App\MsgReplay;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        // $messages=Message::all();
        // $users=User::all()->where('id',$user->messages()->receiver_id);
        $messages=Message::all()->where('receiver_id',$user->id);
        $sender_messages=Message::all()->where('sender_id',$user->id);
        $allusers=User::all();
        // $replies=MsgReplay::all()->where('receiver_id',$user->id);
        return view('home.messages.index',compact('messages','replies','sender_messages','allusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $user=Auth::user();
        $allusers=User::all();
        $messages=Message::all()->where('receiver_id',$user->id);
        $sender_messages=Message::all()->where('sender_id',$user->id);
        $users=User::pluck('name','id')->all();
        return view('home.messages.create',compact('users','messages','sender_messages','user','allusers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        // return $user->photo->file;

        $data=[
        'receiver_id'  =>$request->receiver_id,
        'author'       =>$user->name,
        'email'        =>$user->email,
        'photo'        =>$user->photo->file,
        'sender_id'    =>$user->id,
        'body'         =>$request->body
        ];
        Message::create($data);
        return redirect('home/messages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::all();
        $message=Message::findOrFail($id);
        $replies=$message->msgreply()->get();
        return view('home.messages.show',compact('message','replies','users'));
    }

    // public function conversation(){
    //     $users=User::all();
    //     $messages=Message::all();
    //     return view('home.messages.show',compact('messages','users'));
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Message::findOrFail($id)->delete();
        return redirect()->back();
    }
}
