<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
	 public function __construct(Comment $comment){
	 	$this->middleware('auth');
        $this->comment = $comment;
    }

    function insert(Request $request){
        if($request->ajax())
        {
        $output = "";
        $img = '';
        $delform = '';

		$channelid = DB::table("channels")->where('user_id','=', auth::user()->id)->value('id');

        $selfchname = DB::table("channels")->where('user_id','=', auth::user()->id)->value('name');

		$targetchannelid = DB::table('vines')->where('id', '=', $request->input("page_id"))->value('channel_id');

        $tochannelname = DB::table('vines')->where('id', '=', $request->input("page_id"))->value('channel_name');

        $title = DB::table('vines')->where('id', '=', $request->input("page_id"))->value('title');

        $image = DB::table("channels")->where('user_id', '=', auth::user()->id)->value('image');

        if(!$image){
            $image = null;
        }


		$dataForm = [
			'user_id' =>	auth::user()->id,
			'page_id' =>	$request->page_id,
			'channel_id' =>	$channelid,
			'to_channel_id' => $targetchannelid,
			'comment' =>	$request->input('comment'),
			'channel_name' => $selfchname ,
            'page_title' => $title,
            'to_channel_name' => $tochannelname,
            'image' => $image,

		];

		$this->validate($request, $this->comment->rules);        
        $insert = $this->comment->create($dataForm);

        DB::table('vines')->where('id', '=', $request->input('page_id'))->increment('comments');

            $comments = Comment::where("page_id", '=', $request->input('page_id'))->orderBy('created_at', 'desc')->get();


       foreach($comments as $comentario){
        if($comentario->image){
            $img = "<img src='/images/profile-images/$comentario->image' class='float-left mr-2 rounded-circle' width='32' height='32' >";
        }else{
            $img = '<img src="/images/profile-images/default.png" class="float-left mr-2 rounded-circle" width="32" height="32" >';
        }
        if($comentario->user_id == auth::user()->id){
            $delform = '<form action="'.route("commentDelete").'" method="POST">
              '.csrf_field().'              
                <input type="hidden" id="comment_id" value="{{$comentario->id}}" name="id">
                <input type="hidden" id="cmpage_id" value="{{$value->id}}" name="id_page">
                <button type="submit" class="float-right text-muted border-0 text-muted bg-white btn"> <i class="fas fa-times"></i></button>
            </form>';

        }
        
            
            $output .= ''.$delform.'<a href="/'.$comentario->channel_name.'">
            '.$img.'
            <span class="font-weight-bold">'.$comentario->channel_name.'</span>
            </a>
            <div class="clearfix"></div>
          </div>
                  <span class="card-text">'.$comentario->comment.'</span><br>
          <small class="text-muted">'.\Carbon\Carbon::parse($comentario->created_at)->diffForHumans().'</small>
          <hr>';
                        }

           return Response($output);       

        }

    }

    function delete(Request $del){
    	$del->input('id');
    	$del->input('id_page');
    	$delete = DB::table('comments')->where('id', '=', $del->input('id'))->delete();
    	if($delete){
    		DB::table('vines')->where('id', '=', $del->input('id_page'))->decrement('comments');
    		return redirect()->back()->withInput();
    	}
    	

    }

    function countComment($vine){
        $count = Comment::where('page_id', '=', $vine)->count();

        return $count;
    }
}
