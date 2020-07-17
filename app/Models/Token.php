<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
