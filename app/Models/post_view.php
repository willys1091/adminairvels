<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_view extends Model
{
    public $timestamps = false;

    protected $table = 'post_view';

    public function post_hdr(){
        return $this->belongsTo('App\post_hdr','post_id_hdr');
    }

    public function users(){
        return $this->belongsTo('App\users','user_id');
    }
}
