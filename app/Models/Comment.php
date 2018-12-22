<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
       'user_id', 'page_id', 'channel_id', 'comment','channel_name', 'to_channel_id', 'page_title', 'to_channel_name', 'image'
    ];

    public $rules = [
    	'comment'				=>	'required|string|min:2|max:100',
    	'page_id'				=>	'required',
    	
    ];
}
