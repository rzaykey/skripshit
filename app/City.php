<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    protected $guarded = [];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
