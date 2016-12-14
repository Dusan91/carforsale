<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Advert extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;

     public function sluggable()
    {
        return [
            'slug' => [
                'source'   => 'title',
                'onUpdate' => true
            ]
        ];
    }
    
    //
    protected $fillable = [
        'title', 'body', 'photo_id','category_id','user_id','price','driven','yop','city','registered','phone','cubic_capacity','fuel','nofs','ac','damage','color','transmission'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
    

   

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function photos(){
        return $this->hasMany('App\Photo');  
    }
    

    
    

    public function category(){
        return $this->belongsTo('App\Category');
    }

    
    public function comments(){
    
    return $this->hasMany('App\Comment');
    }
    
    
}
