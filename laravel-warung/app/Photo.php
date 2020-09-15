<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['resto_id','picture', 'status'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'resto_id');
    }
}
