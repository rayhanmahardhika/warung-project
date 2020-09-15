<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['resto_id','traveler_id','date', 'amount'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'resto_id');
    }

    public function traveler()
    {
        return $this->belongsToMany(User::class, 'traveler_id');
    }
}
