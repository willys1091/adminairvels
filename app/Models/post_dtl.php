<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_dtl extends Model{
    use HasFactory;

    public $timestamps = false;
	
    protected $table = 'post_dtl';

    public function destination(){
        return $this->belongsTo('App\Models\destination','destination_id');
    }

    public function post_hdr(){
        return $this->belongsTo('App\Models\post_hdr','post_id_hdr');
    }

}
