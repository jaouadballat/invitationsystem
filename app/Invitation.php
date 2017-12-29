<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Invitation extends Model
{
    public function event()
    {
    	return $this->belongsTo(\App\Event::class);
    }
}
