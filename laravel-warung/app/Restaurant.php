<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    public $timestamps = false;

    protected $table = 'restaurants';
    protected $fillable = ['name','email','password','XYcoor', 'opendate','timeservice', 'address', 'description','pricerate', 'rate', 'location', 'code'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function food()
    {
        return $this->hasMany('App\Food');
    }

    public function feedback()
    {
        return $this->hasMany('App\Feedback');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking');
    }

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
