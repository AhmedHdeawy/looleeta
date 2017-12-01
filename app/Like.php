<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Like extends Model
{
	protected $table = 'likes';
	protected $primaryKey = 'likes_id';
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'articles_id'
    ];


    public function article()
    {
    	return $this->belongsTo('App\Article', 'articles_id', 'articles_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }

}
