<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;


    public function child()
    {
        return $this->belongsTo(self::class, 'parent_category_id');
    }

    // public function children()
    // {
    //     return $this->hasMany(self::class, 'parent_category_id');
    // }
    
}
