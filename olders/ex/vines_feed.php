<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vines_feed extends Controller
{
   


   function vines_feed(){
 
   	$users = DB::table('video')
                ->orderBy('id', 'desc')
                ->get();
                
                return $users;

   


   }
}
