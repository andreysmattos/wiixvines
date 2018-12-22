<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
       'page_id', 'channel_name', 'page_title', 'from_user_id', 'title', 'message',
    ];

    public $rules = [
    	'message'				=>	'required|string|min:3|max:100',
    	'title'				=>	'required|string|min:3|max:50',
    	
    ];
}
