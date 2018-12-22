<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
       'user_id', 'page_id', 'channel_id', 'channel_name', 'to_channel_id', 'page_title', 'to_channel_name', 
    ];

    public $rules = [
    	'page_id'				=>	'required',
    	
    ];
}
