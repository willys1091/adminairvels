<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_hdr extends Model
{
    public $timestamps = false;

    protected $table = 'post_hdr';

    public function country(){
        return $this->belongsTo('App\country','country_id');
    }

    public function admin(){
        return $this->belongsTo('App\admin','create_user');
    }

    public function post_dtl(){
        return $this->hasMany('App\post_dtl');
    }

    public function post_view(){
        return $this->hasMany('App\post_view');
    }
}
