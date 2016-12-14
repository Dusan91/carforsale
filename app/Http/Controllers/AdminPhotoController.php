<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Photo;
use App\Advert;
Use Input;
use Validator;
use Illuminate\Support\Facades\Session;

class AdminPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file=$request->file('file');
            $name=time(). $file->getClientOriginalName();
            $file->move('images',$name);
            Photo::create(['file'=>$name]);
        return redirect('admin/media/index');
    }

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
        return view('admin.media.edit',compact('advert'));
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

        $files=Input::file('advert_id');

        $file_count=count($files);
        $uploadcount=0;
        foreach($files as $file) {
            $name=time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $data=[
            'advert_id'=>$id,
            'file'=>$name
            ];
            Photo::create($data);
            $uploadcount ++;
        }
        if($uploadcount == $file_count){
             return redirect('admin/advert');
            // return $id;
        } 
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
        $photo=Photo::findOrFail($id);
        unlink(public_path() . $photo->file);
        $photo->delete();
        Session::flash('deleted_photo','Photo is Deleted.');
        return redirect('admin/media');
    }
}
