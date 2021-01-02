<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'user';

    public function reff()
    {
        return $this->belongsTo(self::class, 'refferal');
    }

    // public function post_view(){
    //     return $this->hasMany('App\post_view');
    // }


}
