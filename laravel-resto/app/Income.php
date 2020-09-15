<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public $timestamps = false;
    protected $table = 'incomes';
    protected $fillable = ['resto_id','added_on', 'income','transactions'];
}
