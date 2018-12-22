<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Vines;
use Illuminate\Support\Facades\Auth;
use DB;

class PostController extends Controller

{	    public function __construct(Vines $vines){
        $this->vines = $vines;
        $this->middleware('auth');
        $this->middleware('authChannel');    
    
    }
          function myPost(Request $request)
    
    {

        

    	$id = auth::user()->channel_name;
        $idself = Auth::user()->id;

        $widgets['widgets'] = DB::table('channels')->whereNotIn('id', function($query) use ($id)
{
  $query->select('to_channel_id')
        ->from('subscribes')
        ->where('from_channel_name','=', $id);        
})->where('user_id', '!=', $idself)->limit(6)->get();

        

$posts = Vines::whereIn('user_id', function($query) use ($id)
{
  $query->select('to_channel_id')
        ->from('subscribes')
        ->where('from_channel_name','=', $id);
})->orderBy('created_at', 'desc')->paginate(2);


    	if ($request->ajax()) {
    		$view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }  

    	return view('feed',compact('posts'))->with($widgets);
    }

    public function checkChannel($name){
        $ckfollow = DB::table('subscribes')->where('from_channel_name', '=', auth::user()->channel_name)->where('to_channel_name', '=', $name)->value('id');
        return $ckfollow;
    }

    public static function channelImage($id){
        $ver = db::table("vines")->where('id', '=', $id)->value("channel_name");
        $image = DB::table('channels')->where('name', '=', $ver)->value('image');
        return $image;
    }

    



}
