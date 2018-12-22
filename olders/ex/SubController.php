<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
use DB;
use Illuminate\Support\Facades\Auth;

class SubController extends Controller
{   
    private $subs;

    	public function __construct(Subscribe $subs)
        {
    	$this->subs = $subs;
        $this->middleware('auth');
        $this->middleware('authChannel');
        }


    function checkFollow(Request $request)
    {
        $output = 'bugado';

        $channelid = DB::table("channels")->where('user_id', '=', auth::user()->id)->value("id");

        $to_channelid = DB::table("vines")->where('id', '=', $request->pageid)->value('channel_id');

        $exist = Subscribe::where([
                    ['from_channel_id', '=', $channelid],
                    ['to_channel_id', '=', $to_channelid]
                ])->first();

        if($exist){
            $output = 'followed';
        }else{
            $output = 'no';
        }
        return Response($output);
    }

    public function addFollow(Request $request)
    {  
        $selfid = auth::user()->id;

        $from_id = DB::table('channels')->where('user_id', '=', $selfid)->value('id');

        $from_name = DB::table("channels")->where('user_id', '=', auth::user()->id)->value('name');

        $to_id = DB::table("vines")->where('id', '=', $request->searchid)->value('channel_id');

        $to_name = DB::table("vines")->where('id', '=', $request->searchid)->value('channel_name');

        $dataForm = [
            'from_channel_id' =>    $from_id,
            'from_channel_name' =>  $from_name,
            'to_channel_id' =>  $to_id,
            'to_channel_name' => $to_name,

        ];

        $checkexist = Subscribe::where([
                    ['from_channel_id', '=', $from_id],
                    ['to_channel_id', '=', $to_id]
                ])->first();

        if($checkexist){
            return Response('followed');
            die();
        }

        
        $insert = $this->subs->create($dataForm);
        DB::table('channels')->where('id', '=', $to_id)->increment('subscribe');



        return Response('allOk');        
    }

    function unFollow(Request $request)
    {
        $from_id = DB::table("channels")->where('user_id', '=', auth::user()->id)->value('id');
        $from_name = DB::table("channels")->where('user_id', '=', auth::user()->id)->value('name');

        $to_id = DB::table("vines")->where('id', '=', $request->searchid)->value('channel_id');
        $to_name = DB::table("vines")->where('id', '=', $request->searchid)->value('channel_name');

        $delete = Subscribe::where('from_channel_id', '=', $from_id)->where('to_channel_id', '=', $to_id)->delete();
        DB::table('channels')->where('id', '=', $to_id)->decrement('subscribe');

        return Response('allOk');

    }

   


}
