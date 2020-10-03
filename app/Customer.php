<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{

    use Notifiable;
    protected $guarded = [];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    protected $fillable = [
        'name', 'email', 'password', 'address', 'district_id', 'status',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Customer</span>';
        }
        return '<span class="badge badge-success">Admin</span>';
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public static function register($name, $email, $password, $address, $city_id)
    {
        $save = new Customer;
        $savea = $save->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'city_id' => $city_id
        ]);
        if($savea)
        {
            return true;
        }else{
            return false;
        }
    }
}