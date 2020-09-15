<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $timestamps = false;

    protected $table = 'feedbacks';
    protected $fillable = ['resto_id','traveler_id','feedback', 'date', 'rate'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'resto_id');
    }

    public function traveler()
    {
        return $this->belongsTo('App\User', 'traveler_id');
    }
}
