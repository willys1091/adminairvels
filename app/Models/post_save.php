<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_save extends Model
{
    public $timestamps = false;

    protected $table = 'post_save';

    public function post_dtl(){
        return $this->belongsTo('App\post_dtl','post_dtl_id');
    }

    public function destination(){
        return $this->belongsTo('App\destination','destination_id');
    }
}
