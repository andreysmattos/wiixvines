<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribes';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
       'to_channel_id', 'to_channel_name', 'from_channel_id', 'from_channel_name'
    ];
}
