<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    public $timestamps = false;
	
    protected $table = 'destination';

    public function country(){
        return $this->belongsTo('App\country','country_id');
    }

    public function post_dtl(){
        return $this->hasMany('App\post_dtl');
    }
}
