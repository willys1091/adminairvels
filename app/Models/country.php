<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model{
    use HasFactory;

    public $timestamps = false;
	
    protected $table = 'country';

    public function post_hdr(){
        return $this->hasMany('App\post_hdr');
    }

    public function destination(){
        return $this->hasMany('App\destination');
    }
}
