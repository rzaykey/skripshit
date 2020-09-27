<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class District extends Model
{
    protected $guarded = [];
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
