<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'bags_num', 'hospital_name', 'hospital_location','phone', 'blood_type_id', 'city_id', 'notes');

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
