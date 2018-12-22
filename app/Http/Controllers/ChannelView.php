<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Viewer;
use App\Models\Vines;

class ChannelView extends Controller
{
     private $vineview;

    public function __construct(Viewer $vineview){
        $this->vineview = $vineview;        
    
    }   

    function index($channel){

        $check = DB::table('channels')->where('name', '=', $channel)->value('id');


        if(isset($check)){

            $name = DB::table('channels')->where('name', '=', $channel)->value('name');
            $desc = DB::table('channels')->where('name', '=', $channel)->value('description');
            $id = DB::table('channels')->where('name', '=', $channel)->value('id');

            //STYLES            
            $bg_color = DB::table("channels")->where('name', '=', $channel)->value('bg_color');
            if(!$bg_color){
                $bg_color = '';
            }

            $channel_nick = DB::table("channels")->where('name', '=', $channel)->value("channel_nick");
            if(!$channel_nick){
                $channel_nick = $channel;
            }

            $bg_header = DB::table("channels")->where('name', '=', $channel)->value("bg_header");
            if(!$bg_header){
                $bg_header = '#f6f7f2';
            }

            $header_text_color = DB::table("channels")->where('name', '=', $channel)->value("header_text_color");
            if(!$header_text_color){
                $header_text_color = '';
            }

            $all_color = DB::table('channels')->where('name', '=', $channel)->value("all_color");
            if(!$all_color){
                $all_color = '';
            }


            $defaultitem = DB::table("channels")->where('name', '=', $channel)->value('default_item');
            if(!$defaultitem){
                $defaultitem = 'about-me-bg.jpg';
            }else{
                $get = DB::table("vines")->where('id', '=', $defaultitem)->value('link');
                $defaultitem = $get;
            }

            $profileimg = DB::table('channels')->where('name', '=', $channel)->value('image');
            if(!$profileimg){
                $profileimg = 'default.png';
            }

            //FIM STYLES

            $recom['recom'] = DB::table('vines')->where('channel_name', '!=', $channel)->orderBy('created_at', 'desc')->limit(10)->get();


            $idchself = DB::table('channels')->where('name', '=', $channel)->value('id');
            
            $subscribe =  DB::table('channels')->where('name', '=', $channel)->value('subscribe');

            

            $check_default = DB::table('channels')->where('name', '=', $channel)->value('default_item');



            $data['data'] = DB::table('vines')->where('channel_id', '=', $check)->orderBy('id', 'desc')->paginate(12);

            $popular['popular'] = DB::table("vines")->where('channel_id', '=', $check)->orderBy('view', 'desc')->limit(3)->get();

            $latest['latest'] = DB::table("vines")->where('channel_id', '=', $check)->orderBy('created_at', 'desc')->limit(4)->get();


            $others['others'] = DB::table('vines')->where('channel_name', '!=', $channel)->orderBy('created_at', 'desc')->limit(6)->get();

            

            if(auth::check()){
                $ckfollow = DB::table('subscribes')->where('from_channel_name', '=', auth::user()->channel_name)->where('to_channel_name', '=', $channel)->value('id');

                return view('channel_view', ['channel' => $channel, 'name' => $name, 'desc' => $desc,'subscribe' => $subscribe, 'ckfollow' => $ckfollow, 'profileimage' => $profileimg, 'idchself' => $idchself, 'default_item' => $defaultitem, 'bg_color' => $bg_color, 'channel_nick' => $channel_nick, 'bg_header' => $bg_header, 'header_text_color' => $header_text_color, 'all_color' => $all_color])->with($data)->with($popular)->with($latest)->with($others)->with($recom);
            }else{

                return view('channel_view', ['channel' => $channel, 'name' => $name, 'desc' => $desc, 'subscribe' => $subscribe, 'profileimage' => $profileimg, 'idchself' => $idchself, 'default_item' => $defaultitem, 'bg_color' => $bg_color, 'channel_nick' => $channel_nick, 'bg_header' => $bg_header, 'header_text_color' => $header_text_color, 'all_color' => $all_color])->with($data)->with($popular)->with($latest)->with($others)->with($recom);;
            }                       


            
        }else{
            return view('404_watch');
        }


    }

        function show($channel, $vine){

        $check = DB::table('channels')->where('name', '=', $channel)->value('id');
        $vineexist = DB::table('vines')->where('channel_name', '=', $channel)->where('id','=', $vine)->value('id');
        if($check){
            if(!$vineexist){
                return redirect('/'.$channel);
            }

           //STYLES            
            $bg_color = DB::table("channels")->where('name', '=', $channel)->value('bg_color');
            if(!$bg_color){
                $bg_color = '';
            }

            $channel_nick = DB::table("channels")->where('name', '=', $channel)->value("channel_nick");
            if(!$channel_nick){
                $channel_nick = $channel;
            }

            $bg_header = DB::table("channels")->where('name', '=', $channel)->value("bg_header");
            if(!$bg_header){
                $bg_header = '#f6f7f2';
            }

            $header_text_color = DB::table("channels")->where('name', '=', $channel)->value("header_text_color");
            if(!$header_text_color){
                $header_text_color = '';
            }

            $all_color = DB::table('channels')->where('name', '=', $channel)->value("all_color");
            if(!$all_color){
                $all_color = '';
            }


            $defaultitem = DB::table("channels")->where('name', '=', $channel)->value('default_item');
            if(!$defaultitem){
                $defaultitem = 'about-me-bg.jpg';
            }else{
                $get = DB::table("vines")->where('id', '=', $defaultitem)->value('link');
                $defaultitem = $get;
            }

            $profileimg = DB::table('channels')->where('name', '=', $channel)->value('image');
            if(!$profileimg){
                $profileimg = 'default.png';
            }

            //FIM STYLES

            $recom['recom'] = DB::table('vines')->where('channel_name', '!=', $channel)->orderBy('created_at', 'desc')->limit(10)->get();

            $idchself = DB::table('channels')->where('name', '=', $channel)->value('id');

            $check2 = DB::table('vines')->where('channel_id', '=', $check)->where('id', '=', $vine)->value('id');
            
            $name = DB::table('channels')->where('name', '=', $channel)->value('name');
            $desc = DB::table('channels')->where('name', '=', $channel)->value('description');

            // VINE RECORD    V
            $vines['vines'] = DB::table('vines')->where('channel_id', '=', $check)->where('id', '=', $vine)->limit(1)->get(); 

            $likes['likes'] = DB::table("likes")->where('page_id', '=', $vine)->orderBy('created_at', 'desc')->get();

            $popular['popular'] = DB::table("vines")->where('channel_id', '=', $check)->orderBy('view', 'desc')->limit(3)->get();

            $latest['latest'] = DB::table("vines")->where('channel_id', '=', $check)->orderBy('created_at', 'desc')->limit(4)->get();


            $others['others'] = DB::table('vines')->where('channel_name', '!=', $channel)->orderBy('created_at', 'desc')->limit(6)->get();


            $comments['comments'] = DB::table('comments')->where('page_id', '=', $vine)->orderBy('created_at', 'desc')->get();


                        //SUBSCRIBE VERIFY
            $id = DB::table('channels')->where('name', '=', $channel)->value('id');

            $data['data'] = DB::table('vines')->where('channel_id', '=', $check)->orderBy('id', 'desc')->paginate(12);
            

            

            $subscribe =  DB::table('channels')->where('name', '=', $channel)->value('subscribe');





        	 $previous = Vines::where('id', '<', $vineexist)->max('id');
        	 $next = Vines::where('id', '>', $vineexist)->min('id');
            // VIEW
            
            $ts = time() - 60;
            DB::table('totalview')->where('created_at', '<', Carbon::now()->subMinutes(600)->toDateTimeString())->delete();
            $check = DB::table('totalview')->where('visit_ip', '=', $_SERVER['REMOTE_ADDR'])->where('vine_id', '=', $vine)->get();       
            if (count($check) < 1)
                {
                $dataForm = ['vine_id' => $vine, 'visit_ip' => $_SERVER['REMOTE_ADDR'], ];
                $insert = $this->vineview->create($dataForm);
                $update = DB::table('vines')->where('id', '=', $vine)->increment('view');
                }
            // VIEW FIM                
            if(auth::check()){
            $auth_channelid = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('id');
            $self_cname = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('name');
            $ckfollow = DB::table('subscribes')->where('from_channel_id', '=', $auth_channelid)->where('to_channel_id', '=', $id)->value('id');

                 return view('watch', ['name' => $name, 'desc' => $desc, 'channel' => $channel, 'subscribe' => $subscribe, 'ckfollow' => $ckfollow, 'profileimage' => $profileimg, 'default_item' => $defaultitem, 'idchself' => $idchself, 'bg_color' => $bg_color, 'channel_nick' => $channel_nick, 'bg_header' => $bg_header, 'header_text_color' => $header_text_color, 'all_color' => $all_color])->with($vines)->with($popular)->with($latest)->with($others)->with($comments)->with($likes)->with($recom)->with($data)->with('previous', $previous)->with('next', $next);


            }else{

                 return view('watch', ['name' => $name, 'desc' => $desc, 'channel' => $channel, 'subscribe' => $subscribe, 'profileimage' => $profileimg, 'default_item' => $defaultitem, 'idchself' => $idchself, 'bg_color' => $bg_color, 'channel_nick' => $channel_nick, 'bg_header' => $bg_header, 'header_text_color' => $header_text_color, 'all_color' => $all_color])->with($vines)->with($popular)->with($latest)->with($others)->with($comments)->with($likes)->with($recom)->with($data)->with('previous', $previous)->with('next', $next);

            }
           
            
        
        }else{
            return redirect('/');
        }


    }
}
