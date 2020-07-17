<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'fb_link', 'twitter_link', 'youtube_link', 'wapp_link', 'insta_link', 'gmail_link');

}