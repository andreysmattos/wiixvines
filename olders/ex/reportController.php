<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class reportController extends Controller
{
	public function __construct(Report $report){
	 	$this->middleware('auth');
        $this->report = $report;
    }

    function addReport(request $request){
    	$from_user_id = auth::user()->id;

    	$title = $request->input('title');
    	$message = $request->input('message');

    	$dataForm = [
    		'from_user_id'	=>	$from_user_id,
    		'page_id'		=>	$request->input('page_id'),
    		'page_title'	=> 	$request->input('page_title'),
    		'channel_name'	=> 	$request->input('channel_name'),    		    		
    		'title'			=> 	$title,
    		'message'		=>	$message,
    	];

    	$this->validate($request,$this->report->rules);
        $insert = $this->report->create($dataForm);
        if($insert){
        	return redirect()->back()->with("success", "Your report has been tabled, and we will check it out");
        }else
        {
        	return 'error';
        }


    }
}
