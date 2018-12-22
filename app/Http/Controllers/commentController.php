<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\User;
use Carbon\Carbon;
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
            $delform = '<div class="comentarios-feed" id="cm'.$comentario->id.'">
            <a href="#" class="del-comment float-right text-muted border-0 text-muted bg-transparent btn delete" id="'.$comentario->id.'">
               <i class="fas fa-trash-alt"></i>
            </a>';

        }
        
            
            $output .= ''.$delform.'<a href="/'.$comentario->channel_name.'">
            '.$img.'
            <span class="font-weight-bold">'.$comentario->channel_name.'</span>
            </a>
            <div class="clearfix"></div>
          
                  <span class="card-text">'.$comentario->comment.'</span><br>
          <small class="text-muted">'.\Carbon\Carbon::parse($comentario->created_at)->diffForHumans().'</small>
          <hr>
          </div>';
                        }

           return Response($output);       

        }

    }

    function storeComment(request $request){

        // Infos 
        $output = "";
        $channelid = DB::table("channels")->where('user_id','=', auth::user()->id)->value('id');

        $selfchname = DB::table("channels")->where('user_id','=', auth::user()->id)->value('name');

        $targetchannelid = DB::table('vines')->where('id', '=', $request->pageid)->value('channel_id');

        $tochannelname = DB::table('vines')->where('id', '=', $request->pageid)->value('channel_name');

        $title = DB::table('vines')->where('id', '=', $request->pageid)->value('title');

        $image = DB::table("channels")->where('user_id', '=', auth::user()->id)->value('image');

        if(!$image){
            $image = null;
        }

        
        // FIM INFOS

            $comment = new Comment();

            $comment->user_id =  auth::user()->id;
            $comment->page_id =  $request->pageid;
            $comment->channel_id =  $channelid;
            $comment->to_channel_id =  $targetchannelid;
            $comment->comment =  $request->comment;
            $comment->channel_name =  $selfchname;
            $comment->page_title =  $title;
            $comment->to_channel_name =  $tochannelname;
            $comment->image = $image;

            $comment->save();

            $comment = Comment::where('page_id', '=', $request->pageid)->orderBy('created_at', 'desc')->get();

            foreach($comment as $comentario){
                 $output .= '<a href="/'.$comentario->channel_name.'">
            <div class="content-heading"><h5>'.$comentario->channel_name.'</h5></div>
            </a>
          </div>
                  <span class="card-text">'.$comentario->comment.'</span><br>
          <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
          <hr>';

            }
            return Response($output);
    }

    function destroy(Request $request) {


        $comment_userid = DB::table('comments')->where('id', '=', $request->input('id'))->value('user_id');

        if(auth::user()->id === $comment_userid){
            $comment = Comment::find($request->input('id'));
        if($comment->delete())
        {
            return Response("Comment deleted!");
        }
        else
        {
            return reponse('error');
        }

    }else{
        alert('You no have permission to do that.');
        return redirect()->back();
    }


    }

    function countComment($vine){
        $count = Comment::where('page_id', '=', $vine)->count();

        return $count;
    }
}
