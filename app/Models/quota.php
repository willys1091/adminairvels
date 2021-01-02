<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quota extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'quota';

    protected $attributes = [
		'active' => 1,
	];
}
