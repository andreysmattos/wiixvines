<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;
use DB;
use Illuminate\Support\Facades\Auth;



class LikesController extends Controller
{
    private $likes;

    public function __construct(Likes $likes){

        $this->like = $likes;    
        $this->middleware('auth');
        $this->middleware('authChannel');    
    
    }
    function imgLike(request $request)
    {

        $ver = Likes::where('user_id', '=', auth::user()->id)->where('page_id', '=', $request->pageid)->value('id');
        if($ver){

            $id = $request->pageid;
        $check = DB::table("vines")->where('id', '=', $request->pageid)->value('id');
        if($check){
            Likes::where('user_id','=',auth::user()->id)->where('page_id', '=', $id)->delete();
            DB::table('vines')->where('id', '=', $request->pageid)->decrement('likes');

            $num_likes = DB::table('vines')->where('id', '=', $request->pageid)->value('likes');

                return Response($num_likes);


        }

        }else{

            $id = $request->pageid;
        $check = DB::table("vines")->where('id', '=', $request->pageid)->value('id');
        if($check){
        $channelid = DB::table("channels")->where('user_id','=', auth::user()->id)->value('id');

        $selfchname = DB::table("channels")->where('user_id','=', auth::user()->id)->value('name');

        $targetchannelid = DB::table('vines')->where('id', '=', $request->pageid)->value('channel_id');

        $tochannelname = DB::table('vines')->where('id', '=', $request->pageid)->value('channel_name');

        $title = DB::table('vines')->where('id', '=', $request->pageid)->value('title');

        $dataForm = [
            'user_id' =>    auth::user()->id,
            'page_id' =>    $id,
            'channel_id' => $channelid,
            'to_channel_id' => $targetchannelid,            
            'channel_name' => $selfchname ,
            'page_title' => $title,
            'to_channel_name' => $tochannelname,            

        ];

     
        $insert = $this->like->create($dataForm);
        DB::table('vines')->where('id', '=', $request->pageid)->increment('likes');

        $num_likes = DB::table('vines')->where('id', '=', $request->pageid)->value('likes');

        return Response($num_likes);

        }

    }
}

    function show(Request $request){
    	$ver = Likes::where('user_id', '=', auth::user()->id)->where('page_id', '=', $request->pageid)->value('id');
    	$output = '';
    	if($ver){
    		$output = 'true';
    	}else{
    		$output = 'false';
    	}
    	return Response($output);
    }


    function store(Request $request){
    	$id = $request->pageid;
    	$check = DB::table("vines")->where('id', '=', $request->pageid)->value('id');
    	if($check){
    	$channelid = DB::table("channels")->where('user_id','=', auth::user()->id)->value('id');

        $selfchname = DB::table("channels")->where('user_id','=', auth::user()->id)->value('name');

		$targetchannelid = DB::table('vines')->where('id', '=', $request->pageid)->value('channel_id');

        $tochannelname = DB::table('vines')->where('id', '=', $request->pageid)->value('channel_name');

        $title = DB::table('vines')->where('id', '=', $request->pageid)->value('title');

    	$dataForm = [
			'user_id' =>	auth::user()->id,
			'page_id' =>	$id,
			'channel_id' =>	$channelid,
			'to_channel_id' => $targetchannelid,			
			'channel_name' => $selfchname ,
            'page_title' => $title,
            'to_channel_name' => $tochannelname,            

		];

     
        $insert = $this->like->create($dataForm);
        DB::table('vines')->where('id', '=', $request->pageid)->increment('likes');

        $num_likes = DB::table('vines')->where('id', '=', $request->pageid)->value('likes');

        return Response($num_likes);



    }
}

	function destroy(Request $request){
		$id = $request->pageid;
		$check = DB::table("vines")->where('id', '=', $request->pageid)->value('id');
    	if($check){
    		Likes::where('user_id','=',auth::user()->id)->where('page_id', '=', $id)->delete();
    		DB::table('vines')->where('id', '=', $request->pageid)->decrement('likes');

            $num_likes = DB::table('vines')->where('id', '=', $request->pageid)->value('likes');

                return Response($num_likes);


    	}

	}
}
