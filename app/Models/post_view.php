<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_view extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'post_view';

    public function post_hdr(){
        return $this->belongsTo('App\Models\post_hdr','post_id_hdr');
    }

    public function users(){
        return $this->belongsTo('App\Models\users','user_id');
    }
}
