<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable 
{
    use Notifiable;
    
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'password', 'email', 'birth_date', 'last_donate', 'blood_type_id', 'city_id', 'pin_code', 'api_token');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }
    protected $hidden = [
        'password', 'api_token',
    ];

}
