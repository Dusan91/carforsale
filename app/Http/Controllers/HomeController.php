<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Advert;
use App\Message;
use App\Category;

use App\User;

use App\Photo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       if ($user=Auth::user()) {
        $allusers=User::all();
        $messages=Message::all()->where('receiver_id',$user->id);
        $sender_messages=Message::all()->where('sender_id',$user->id);
        $adverts=Advert::paginate(3);
        $categories=Category::all();
        return view('home.home',compact('adverts','categories','messages','sender_messages','allusers'));
       }else{
        $adverts=Advert::paginate(3);
        $categories=Category::all();
        return view('home.home',compact('adverts','categories'));
        }
    }

    // public function advert($slug){
    //     $advert=Advert::findBySlugOrFail($slug);
    //     $categories=Category::all();
    //     $comments=$advert->comments()->whereIsActive(1)->get();
    //     return view('layouts.oglas',compact('advert','categories','comments'));
    // }
     public function advert($slug){
        $user=Auth::user();
        $allusers=User::all();
        $messages=Message::all()->where('receiver_id',$user->id);
        $sender_messages=Message::all()->where('sender_id',$user->id);
        $advert=Advert::findBySlugOrFail($slug);
        $collection = Advert::all();
        $photos=$advert->photos()->where('advert_id',$advert->id)->get();
        $categories=Category::all();
        $comments=$advert->comments()->whereIsActive(1)->get();
        return view('home.home_advert',compact('advert','categories','comments','photos','messages','sender_messages','allusers'));
    }

    public function home($id){
        $categories=Category::all();
        $category=Category::findOrFail($id);
        $adverts=$category->advert()->paginate(3);
        return view('home.home_category',compact('adverts','categories','category'));
    }

    // public function contact(){
    //     return view('home.user');
    // }
    
    
}
