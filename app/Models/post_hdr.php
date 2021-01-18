<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_hdr extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'post_hdr';

    public function country(){
        return $this->belongsTo('App\Models\country','country_id');
    }

    public function admin(){
        return $this->belongsTo('App\Models\admin','create_user');
    }

    public function post_dtl(){
        return $this->hasMany('App\Models\post_dtl');
    }

    public function post_view(){
        return $this->hasMany('App\Models\post_view');
    }
}
