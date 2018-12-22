<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authChannel');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $channelid = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('id');

        $allviews = DB::table('vines')->where('channel_id', '=', $channelid)->sum('view');

        $mostview = DB::table('vines')->where('channel_id', '=', $channelid)->orderBy('view','desc')->limit(1)->value('view');
        if(empty($mostview))$mostview =  '0';

        $subs = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('subscribe');

        $countvines = DB::table('vines')->where('channel_id', '=', $channelid)->count();

        $cname = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('name');

        $cdesc = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('description');

        $data['data'] = DB::table('vines')->where('channel_id', '=', $channelid)->limit(4)->get();

        $not['not'] = DB::table("comments")->where('to_channel_id', '=', $channelid)->where('channel_name', '!=', auth::user()->channel_name)->limit(6)->get();

        $ditem = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('default_item');


        return view('painel.index', ['allviews' => $allviews, 'mostview' => $mostview, 'subs' => $subs, 'countvines' => $countvines, 'cname' => $cname, 'cdesc' => $cdesc, 'ditem' => $ditem], $data)->with($not);
        

    }

    function pSettings(){
      $keycode = db::table("channels")->where('user_id', '=', auth::user()->id)->value('keycode');
      return view('painel.personal-settings', ['keycode' => $keycode]);
    }
    function showChangePasswordForm(){
      return view('painel.password-reset');
    }


    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $this->validate(request(), [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }


    function subsPage(){

      $id = auth::user()->channel_name;
      $idself = Auth::user()->id;

      $subs['subs'] = DB::table('channels')->whereIn('id', function($query) use ($id)
{
  $query->select('to_channel_id')
        ->from('subscribes')
        ->where('from_channel_name','=', $id)
        ->orderBy('created_at', 'desc');
})->paginate(15);

      return view('painel.following', $subs);

    }


    public function interactions(){
        $channelid = DB::table("channels")->where('user_id', '=', auth::user()->id)->value('id');

        $data['data'] = DB::table("comments")->where('to_channel_id', '=', $channelid)->where('channel_name', '!=', auth::user()->channel_name)->orderBy('id', 'desc')->paginate(20);

        $check = DB::table("comments")->where('to_channel_id', '=', $channelid)->where('channel_name', '!=', auth::user()->channel_name)->orderBy('id', 'desc')->value('id');

        return view('painel.last-interactions', $data, ['check' => $check]);


    }


    public function fastinteraction(request $request){


if($request->ajax())
 
{
$output = '<p class="text-muted">Your notifications will appear here...</p><hr>';


$channelid = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('id');

$products = DB::table("comments")->where('to_channel_id', '=', $channelid)->where('channel_name', '!=', auth::user()->channel_name)->orderBy('id', 'desc')->limit(6)->get();


$channel_name = auth::user()->channel_name;


if($products)
 
{
 
foreach ($products as $product) {
    $output .='<p>'.$product->channel_name.' commented on his <a href="/'.$channel_name.'/'.$product->page_id.'" target="_blank">vine</a></p><small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small><hr>';


}


}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }




    public function interactionpage(request $request){


if($request->ajax())
 
{
$output = '';
$channelid = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('id');

$products = DB::table("comments")->where('to_channel_id', '=', $channelid)->where('channel_name', '!=', auth::user()->channel_name)->orderBy('id', 'desc')->limit(6)->get();

$channel_name = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('name');


if($products)
 
{
 
foreach ($products as $key => $product) {
    $title = DB::table('vines')->where('id', '=', $product->page_id)->value('title');
    $output ='<div class="clearfix">      <img src="/images/user_lv1.png" class="float-left mr-2 rounded-circle" width="32" height="32" >
      <form action="'.route('commentDelete').'" method="POST">
        '.csrf_field().'
      <a href="" class="text-muted float-right">
      <input type="hidden" value="'.$product->id.'" name="id">
      <input type="hidden" value="'.$product->page_id.'" name="id_page">
      <button type="submit" class="border-0 text-muted bg-white btn"><i class="fas fa-times"></i></button>      
      </a>
      </form>
      <div class="content-heading"><h5><a href="/account/user/'.$product->channel_name.'" target="_blank">'.$product->channel_name.' </a><small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small></h5></div>
      
    </div>
    <span class="card-text">'.$product->comment.'</span><br>
    <small class="text-muted">in <a href="/'.$channel_name.'/'.$product->page_id.'" target="_blank">'.$title.'</a></small>
    
    <hr>';


}


}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }


   

}
