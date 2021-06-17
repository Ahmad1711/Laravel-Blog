<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;//for trashed post
    protected $dates=['deleted_at'];//field for trashed post in database
    
    protected $fillable=[
        'title','content','category_id','featured','slug','user_id'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);//get full path for the image

    }
    public function category()
    {
        return $this->belongsTo('App\Category');
        /*$this->belongsTo('Category::class')*/
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','post_tag');
    }
        
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
