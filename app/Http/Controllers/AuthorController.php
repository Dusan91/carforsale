<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Advert;

use App\Photo;

use App\Category;

use App\Http\Requests;

use App\Http\Requests\AdvertRequest;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use App\Comment;
use App\Message;
use App\User;

Use Input;

class AuthorController extends Controller
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
        $allusers=User::all();
        $messages=Message::all()->where('receiver_id',$user->id);
        $sender_messages=Message::all()->where('sender_id',$user->id);
        $advert=Advert::findBySlugOrFail($slug);
        $collection = Advert::all();
        $photos=$advert->photos()->where('advert_id',$advert->id)->get();
        $categories=Category::all();
        $comments=$advert->comments()->whereIsActive(1)->get();
        return view('author.create',compact('advert','categories','comments','photos','messages','sender_messages','allusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $allusers=User::all();
        $messages=Message::all()->where('receiver_id',$user->id);
        $sender_messages=Message::all()->where('sender_id',$user->id);
        $categories=Category::pluck('name','id')->all();
        return view('author.create',compact('categories','messages','sender_messages','allusers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertRequest $request)
    {
        //
        $input=$request->all();
        $user=Auth::user();
        if ($file=$request->file('photo_id')) {
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }

        $user->adverts()->create($input);
         Session::flash('created_adv','Advert is Created');

        return redirect('/author/last');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $advert=Advert::get()->last();
        return view('author.show',compact('advert'));
    }

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
        $advert=Advert::findOrFail($id);
        unlink(public_path() . $advert->photo->file);
        $advert->delete();
        Session::flash('deleted_adv','Advert is Deleted');
        return redirect('/home');
    }

     
}
