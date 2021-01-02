<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_save extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'post_save';

    public function post_dtl(){
        return $this->belongsTo('App\Models\post_dtl','post_dtl_id');
    }

    public function destination(){
        return $this->belongsTo('App\Models\destination','destination_id');
    }
}
