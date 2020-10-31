<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Auther;

class Customer extends Auther
{

    use Notifiable;
    protected $guard = 'customer';
    protected $fillable = [
        'name', 'email', 'password', 'address', 'city_id', 'status',
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
    public function city()
    {
        return $this->belongsTo(City::class);
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