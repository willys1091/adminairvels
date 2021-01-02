<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model{
    use HasFactory;

    public $timestamps = false;
	
    protected $table = 'destination';

    public function country(){
        return $this->belongsTo('App\Models\country','country_id');
    }

    public function post_dtl(){
        return $this->hasMany('App\Models\post_dtl');
    }
}
