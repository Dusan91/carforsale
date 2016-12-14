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

use App\User;

Use Input;



class AdminAdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $adverts=Advert::all();
        return view('admin.advert.index',compact('adverts'));
    }


    


    

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->all();
        return view('admin.advert.create',compact('categories'));
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
        return redirect('admin/advert');           
    }



    // public function moreimages($id){    
    //     $advert=Advert::findOrFail($id);
    //     return view('admin.advert.more',compact('advert'));  
    // }
    

    // public function more(){
    //      $file=$request->file('file');
    //         $name=time(). $file->getClientOriginalName();
    //         $file->move('images',$name);
    //         $data=[
    //         'advert_id'=>$request->advert_id,
    //         'file'=>$name
    //         ];
    //         Photo::create($data);
    //     return redirect('admin/advert/index');
    // }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response


     */

  

   
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $advert=Advert::findOrFail($id);
        $categories=Category::pluck('name','id')->all();
        return view('admin.advert.edit',compact('advert','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertRequest $request, $id)
    {

        $advert=Advert::findOrFail($id);
        $input=$request->all();
          if ($file=$request->file('photo_id')) {
            $name=time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
         $advert->update($input);
        Session::flash('updated_adv','Advert is Updated');
        return redirect('/admin/advert');

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
        $advert=Advert::findOrFail($id);
        unlink(public_path() . $advert->photo->file);
        $advert->delete();
        Session::flash('deleted_adv','Advert is Deleted');
        return redirect('/admin/advert');
    }
}
