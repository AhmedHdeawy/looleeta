<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        'users_id', 'categories_id', 'articles_title', 'articles_desc', 'articles_img'
    ];

    public function setArticlesImgAttribute($value)
    {
        
        if(\Request::hasFile('articles_img')) {
            
            // Build a unique name for image
            $imageName = str_random(5) .time().'.'.$value->getClientOriginalExtension();
            // Store Image in path
            $value->move(public_path('images/articles'), $imageName);

            // Store name in DB
            $this->attributes['articles_img'] = $imageName;
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

}
