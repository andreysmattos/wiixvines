<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Canal;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;


class ChannelController extends Controller
{

    private $canal;


    public function __construct(Canal $canal){
        $this->canal = $canal;
        $this->middleware('auth');
        $this->middleware('haveChannel');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('painel.create-rules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.create-channel');  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $dataForm = $request->except('_token');
        // $insert = DB::table('channels')->insert($dataForm);
        // if($insert) 
        //     return 'Inserido!';
        // else
        //     return 'erro';
        

        // $channel = new Canal;
        // $channel->user_id = $id;
        // $channel->name = $request->input('name');
        // $channel->keycode = $request->input('keycode');
        // $channel->description = $request->input('description');

        // $channel->save();
            $id = Auth::id();
          $dataForm = [
              'user_id' => $id,
              'name' => $request->input('name'),
              'keycode' => 'TibiaVines.com/'.$request->input('keycode'),
              'description' => $request->input('description'),

         ];
         $checkdb = DB::table('channels')->where('user_id', '=', $id)->value('id');
         if(!empty($checkdb)){
            session()->put(['back_msg' => 'We noticed that you already have a channel, sorry.']);
            return redirect('/');

         }

        $this->validate($request, $this->canal->rules);
        $insert = $this->canal->create($dataForm);
        if($insert){
            $user = User::find($id);
            $user->channel_name = $request->input('name');
            $user->save();

        return redirect('/user/control-panel');
        }else{
        return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
