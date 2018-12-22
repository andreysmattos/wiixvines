<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Vines extends Model
{


  
	protected $table = 'vines';

    protected $fillable = [
       'user_id', 'channel_id' ,'channel_name','title', 'link', 'server', 'playmode', 'pvptype', 'description','type'
    ];

    public $rules = [
      'server'       => 'required|min:3',
    	'title'        =>		'required|min:5|max:50|string',
      'link'      	 => 	'required|min:15|max:30|unique:vines|string',
       // 'description'       => 'max:200|string',

    ];

    public $photorules = [
      'picture' => 'required|mimes:jpeg,jpg,png|max:2048',
    	];


}
