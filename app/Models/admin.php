<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'admin';

    public function post_hdr(){
        return $this->hasMany('App\Models\post_hdr');
    }
}
