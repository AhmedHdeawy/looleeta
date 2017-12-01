<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'categories_id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories_name', 'categories_slug', 'parents_id',
    ];


    public function parent()
    {
    	return $this->belongsTo('App\Category', 'parents_id', 'categories_id');
    }

    public function children()
    {
    	return $this->hasMany('App\Category', 'parents_id', 'categories_id');
    }

    public function articles()
    {
    	return $this->hasMany('App\Article', 'categories_id', 'categories_id');
    }
}
