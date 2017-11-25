<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    *   Has password
    */
    public function setPasswordAttribute($value)
    {
        $value = bcrypt($value);
        $this->attributes['password'] = $value;
    }

    public function setImageAttribute($value)
    {

        // Build a unique name for image
        $imageName = str_random(5) .time().'.'.$value->getClientOriginalExtension();
        // Store Image in path
        $value->move(public_path('images/users'), $imageName);

        // Store name in DB
        $this->attributes['image'] = $imageName;
        
    }

    
}