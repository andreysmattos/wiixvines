<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vines;
use App\Models\Canal;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class VinesController extends Controller
{
        private $vines;


    public function __construct(Vines $vines){
        $this->vines = $vines;
        $this->middleware('auth');
        $this->middleware('authChannel');
       
        
    
    }
    
    public function setDefault(Request $request){
        $channelid = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('id');

            $channel = Canal::find($channelid);
            $channel->default_item = $request->input('id');
            $channel->save();           
            return back()->withInput();
    }

        function feed(request $request)
    {

        $id = auth::user()->channel_name;
        $idself = Auth::user()->id;

$data['data'] = DB::table('vines')->whereIn('user_id', function($query) use ($id)
{
  $query->select('to_channel_id')
        ->from('subscribes')
        ->where('from_channel_name','=', $id);
})->orWhere('user_id', $idself)->paginate(2);

    
        if($request->ajax()) 
        {
            $view = view('data_feed',compact('data'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('feed', $data);

            
  

        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id = Auth::id();
         $url="js/type_worlds.json";
$json = file_get_contents($url);
$data = json_decode($json);
$count = count($data[0]->worlds);
   
        $channels = DB::table('channels')->where('user_id', '=', $id)->value('keycode');
        return view('painel.upload-vine', ['keycode' => $channels, 'json' => $data, 'countj' => $count]);
    }

    public function createPhoto()
    {   
        $id = Auth::id();
         $url="js/type_worlds.json";
$json = file_get_contents($url);
$data = json_decode($json);
$count = count($data[0]->worlds);
   
        $channels = DB::table('channels')->where('user_id', '=', $id)->value('keycode');
        return view('painel.upload-photo', ['json' => $data, 'countj' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function photoInsert(request $request){

    $this->validate(request(), [
        'server' => 'required|min:3',
        'title' => 'required|min:3',
        'description' => 'max:200',
        'link' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072'
    ]);

    $url="js/api_worlds.json";
    $json = file_get_contents($url);
    $data = json_decode($json);
    $count = count($data);

        $i=0;
        $svinput = $request->input('server');
        if(!$svinput){
            return back()->withInput('erros', 'Choose your server.');
        }
        while($data->worlds->allworlds[$i]->name != $svinput) {
            $i++;
        }
        
        $pvptype = $data->worlds->allworlds[$i]->worldtype;

    

    //PEGANDO INFOS

        $channelid = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('id');
        $channelname = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('name');

    //FIM PEGANDO INFOS

    $fileName = null;
    if (request()->hasFile('link')) {
        $file = request()->file('link');
        $fileName = time() . "." . $file->getClientOriginalExtension();
        $file->move('./images/uploads/', $fileName);    
    }

    $dataForm = [
        'user_id'       => auth::user()->id,
        'channel_id'    => $channelid,
        'channel_name'  => $channelname,
        'title'         => $request->input('title'),
        'description'   => $request->input('description'),
        'link'          => $fileName,
        'server'        => $request->input('server'),
        'pvptype'       => $pvptype,
        'type'          => '0',
        'playmode'      => 'PvP',

    ]; 
    $insert = $this->vines->create($dataForm);

    $videoid = DB::table('vines')->where('link', '=', $fileName)->value('id');

    return redirect('/'.$channelname.'/'.$videoid);



    }

    function showChannel(){

            $data['data'] = db::table('channels')->where('user_id', '=', auth::user()->id)->get();

            $channel = DB::table("channels")->where('user_id','=', Auth::user()->id)->value('name');
            $check = DB::table('channels')->where('user_id','=', Auth::user()->id)->value('id');
            $vines['vines'] = DB::table('vines')->where('channel_id', '=', $check)->get();


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



            $phts['phts'] = DB::table('vines')->where('channel_id', '=', $check)->orderBy('id', 'desc')->paginate(12);

            $popular['popular'] = DB::table("vines")->where('channel_id', '=', $check)->orderBy('view', 'desc')->limit(3)->get();

            $latest['latest'] = DB::table("vines")->where('channel_id', '=', $check)->orderBy('created_at', 'desc')->limit(4)->get();


            $others['others'] = DB::table('vines')->where('channel_name', '!=', $channel)->orderBy('created_at', 'desc')->limit(6)->get();

            

            if(auth::check()){
                $ckfollow = DB::table('subscribes')->where('from_channel_name', '=', auth::user()->channel_name)->where('to_channel_name', '=', $channel)->value('id');

                return view('painel.channel-studio', ['channel' => $channel, 'name' => $name, 'desc' => $desc,'subscribe' => $subscribe, 'ckfollow' => $ckfollow, 'profileimage' => $profileimg, 'idchself' => $idchself, 'default_item' => $defaultitem, 'bg_color' => $bg_color, 'channel_nick' => $channel_nick, 'bg_header' => $bg_header, 'header_text_color' => $header_text_color, 'all_color' => $all_color])->with($data)->with($popular)->with($latest)->with($others)->with($recom)->with($phts)->with($vines);
            }else{

                return view('painel.channel-studio', ['channel' => $channel, 'name' => $name, 'desc' => $desc, 'subscribe' => $subscribe, 'profileimage' => $profileimg, 'idchself' => $idchself, 'default_item' => $defaultitem, 'bg_color' => $bg_color, 'channel_nick' => $channel_nick, 'bg_header' => $bg_header, 'header_text_color' => $header_text_color, 'all_color' => $all_color])->with($data)->with($popular)->with($latest)->with($others)->with($recom)->with($phts)->with($vines);
            }                       




    }

    function updateProfile(request $request){
    $this->validate(request(), [
        'description' => 'max:200',
        'link' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

    ]);

    
    
    $canalid = Canal::where('user_id','=',auth::user()->id)->value('id');

    $flight = Canal::find($canalid); 
  

    $fileName = null;
    if (request()->hasFile('link')) {
        $oldfile = Canal::where('user_id', '=', auth::user()->id)->value('image');
        if($oldfile){
            $file_with_path = $_SERVER['DOCUMENT_ROOT'] . "/images/profile-images/$oldfile";
                if (file_exists($file_with_path))
                {
                    unlink($file_with_path);
                }
        }


        $file = request()->file('link');
        $fileName = $file->getClientOriginalName() . time() . "." . $file->getClientOriginalExtension();
        $file->move('./images/profile-images/', $fileName);  
        $flight->image = $fileName;

            // $idcomment = Comment::where('user_id', '=', auth::user()->id)->value('id');
            $update = Comment::where('user_id', '=', auth::user()->id)->update(['image' => $fileName]);

    }  

   

    $flight->description = $request->input('description');
    $flight->all_color = $request->input('all_color');
    $flight->bg_color = $request->input('bg_color');
    $flight->channel_nick = $request->input('channel_nick');
    $flight->header_text_color = $request->input('header_text_color');
    $flight->bg_header = $request->input('bg_header');

    $flight->save();

    if($flight){
        return redirect()->back()->with("success","Channel studio updated!");
    }
    return back();

    }


    public function store(Request $request)
    {
        //WORLD PVPTYPE
        $url="js/api_worlds.json";
$json = file_get_contents($url);
$data = json_decode($json);
$count = count($data);

        $i=0;
        $svinput = $request->input('server');
        while($data->worlds->allworlds[$i]->name != $svinput) {
            $i++;
        }
        $pvptype = $data->worlds->allworlds[$i]->worldtype;



        //fim world pvptype

        //VERIFICAR CODIGO
        $WebSite = "https://www.youtube.com/".$request->input('link');
        $web = file_get_contents($WebSite);
        if(strpos($web, $request->keycode) == false){
            $request->session()->put(['msgkeycode' => 'We can not find the keycode in the description of the video.']);
                return redirect('/user/upload');
                die();
            }
        


        //FIM VERIFICAR CODIGO

        $id = Auth::id();
        $channelid = DB::table('channels')->where('user_id', '=', $id)->value('id');
        $channelname = DB::table('channels')->where('user_id', '=', $id)->value('name');
        $link = explode('&', $request->input('link'));
        $dataForm = [
            'user_id' => auth::user()->id,
            'channel_id' => $channelid,
            'type' => '1',
            'channel_name' => $channelname,
            'title' => $request->input('title'),
            'link' => $link[0],
            'server' => $request->input('server'),
            'playmode' => $request->input('playmode'),
            'pvptype' => $pvptype,
            'description' => $request->input('description'),

        ];
        $origin = Vines::where('link', '=', $link[0])->value('id');
        if($origin){
            return redirect()->back()->with('errors','This video already posted!');
            die();
        }
        $this->validate($request, $this->vines->rules);

        $insert = $this->vines->create($dataForm);
        if($insert){
            $videoid = DB::table('vines')->where('link', '=', $request->input('link'))->value('id');
            return redirect('/'.$channelname.'/'.$videoid);
        }else{
        return redirect('/');
        }

        

    }

    public function show($id)
    {   
        $selfid = DB::table('channels')->where('user_id', '=', auth::user()->id)->value('id');



        $data['data'] = DB::table('vines')->where('id', '=', $id)->where('channel_id', '=', $selfid)->get();

        $check = DB::table('vines')->where('id', '=', $id)->where('channel_id', '=', $selfid)->first();
        if($check){
            return view('painel.vines-manage', $data);
        
        }else{
            return redirect('/user/control-panel');
        }

    }

    function studioList(){
        $id = Auth::id();
        $channelself = DB::table('channels')->where('user_id', '=', $id)->value('id');

        $data['data'] = DB::table('vines')->where('channel_id', '=', $channelself)->get();

        $ditem = DB::table('channels')->where('user_id', '=', Auth::user()->id)->value('default_item');

        $checkexist = DB::table('vines')->where('channel_id', '=', $channelself)->value('id');

        if(isset($checkexist))
        {
            return view('painel.vines-studio', $data,  ['nothing' => '0', 'ditem' => $ditem]);
        }
        else
        {
            return view('painel.vines-studio',  ['nothing' => '1']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $title = $request->input('title');
        $desc = $request->input('description');
        $playmode = $request->input('playmode');

        $vines = Vines::find($id);

        $vines->title = $title;
        $vines->description = $desc;
        $vines->playmode = $playmode;

        $vines->save();
        return redirect('/user/vines');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $del)
    {
        $del->input('id');
        $link = DB::table("vines")->where('id', '=', $del->input('id'))->value('link');
        $type = DB::table("vines")->where('id', '=', $del->input('id'))->value('type');

        $delete = DB::table('vines')->where('id', '=', $del->input('id'))->delete();
        if($delete){
            if($type == '0'){
                $file_with_path = $_SERVER['DOCUMENT_ROOT'] . "/images/uploads/$link";
                if (file_exists($file_with_path))
                {
                    unlink($file_with_path);
                }
            }
            return back()->withInput();
        }
    }
}
