<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
	protected $table = 'ads';
	protected $primaryKey = 'ads_id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ads_link', 'ads_img', 'ads_type'
    ];

    public function setAdsImgAttribute($value)
    {

        // Build a unique name for image
        $imageName = str_random(5) .time().'.'.$value->getClientOriginalExtension();
        // Store Image in path
        $value->move(public_path('ads'), $imageName);

        // Store name in DB
        $this->attributes['ads_img'] = $imageName;
        
    }

}
