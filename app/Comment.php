<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
	protected $table = 'comments';
	protected $primaryKey = 'comments_id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'articles_id', 'comments_desc'
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
