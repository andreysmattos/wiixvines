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
    function store(Request $request)
    {   
        try {

             $id = Auth::id();
        if($request->input('terms') != '1'){
            return redirect()->back()->with('errors', 'You need to accept the terms of use
');
        }

       $fileName = null;
    if (request()->hasFile('link')) {           
        $file = request()->file('link');
        $fileName = $file->getClientOriginalName() . time() . "." . $file->getClientOriginalExtension();
        $file->move('./images/profile-images/', $fileName);
        }

       

          $dataForm = [
              'user_id' => $id,
              'name' => strtolower($request->input('name')),
              'image' => $fileName,
              'keycode' => 'TibiaVines.com/'.$request->input('keycode'),
              'description' => $request->input('description'),

         ];

         $checkdb = DB::table('channels')->where('user_id', '=', $id)->value('id');
         if($checkdb){
            session()->put(['back_msg' => 'We noticed that you already have a channel.']);
            return redirect('/');
         }

        $this->validate(request(), [
        'name'          => 'required|min:3|max:15|unique:channels|string',
        'description' => 'max:200',
        'terms' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

    ]);
        $insert = $this->canal->create($dataForm);
        if($insert){
            $user = User::find($id);
            $user->channel_name = $request->input('name');
            $user->save();

        return redirect('/user/upload-photo')->with('welcome', true);
        }else{
        return redirect('/');
        }

            
        } catch (Exception $e) {
            return redirect()->back()->with('back_msg', 'Some error happended, sorry!');
            
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
