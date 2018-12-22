<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
	protected $table = 'channels';

    protected $fillable = [
       'user_id' ,'name', 'keycode',
    ];

    	public $rules = [
    'name'          => 'required|min:3|max:15|unique:channels|string',
    'keycode'       => 'required|min:3|max:15|unique:channels|string',
        
    ];
}
