<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quota extends Model
{
    public $timestamps = false;

    protected $table = 'quota';

    protected $attributes = [
		'active' => 1,
	];
}
