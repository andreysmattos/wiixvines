<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
	protected $table = 'totalview';

    protected $fillable = [
       'vine_id' ,'visit_ip',   
    ];

    public $rules = [
    	'vine_id'          => 'required|integer',
        'visit_ip'       => 'required|min:2',

    ];


}
