<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class Article extends Model
{
	protected $table = 'articles';
	protected $primaryKey = 'articles_id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'categories_id', 'articles_title', 'articles_desc', 'articles_slug', 'articles_img'
    ];

    public function setArticlesImgAttribute($value)
    {
        
        if(\Request::hasFile('articles_img')) {
            
            // // Build a unique name for image
            // $imageName = str_random(5) .time().'.'.$value->getClientOriginalExtension();
            // // Store Image in path
            // $value->move(public_path('images/articles'), $imageName);


            $image       = \Request::file('articles_img');
            
            $filename    = str_random(5) .time().'.'.$image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(715, 500);
            
            $image_resize->save(public_path('images/articles/' .$filename));


            // Store name in DB
            $this->attributes['articles_img'] = $filename;
        }

        
    }

    public function category()
    {
    	return $this->belongsTo('App\Category', 'categories_id', 'categories_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'articles_id', 'articles_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'articles_id', 'articles_id');
    }

}
