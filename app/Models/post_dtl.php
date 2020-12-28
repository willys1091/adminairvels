<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_dtl extends Model
{
    public $timestamps = false;
	
    protected $table = 'post_dtl';

    public function destination(){
        return $this->belongsTo('App\destination','destination_id');
    }

    public function post_hdr(){
        return $this->belongsTo('App\post_hdr','post_id_hdr');
    }
}
