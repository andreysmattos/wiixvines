<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Vines;
use App\Models\Comment;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
		$reports['reports'] = Report::orderBy('created_at', 'desc')->limit(4)->get();
		$last['last'] = User::orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin-panel.admin', $reports, $last);
    }
    public function reports()
    {
		$reports['reports'] = Report::orderBy('created_at', 'desc')->paginate(20);
        return view('admin-panel.reports', $reports);
    }

    function deletePost(request $request)
    {
		$delete = Vines::where('id', '=', $request->input('page_id'))->delete();
		if($delete){
			return redirect()->back()->with("success", 'Post Deleted!');
		}else{
			return redirect()->back()->with("errors", 'Algum erro ocorreu.');
		}
    }

    function showComments(){
    	$com['com'] = Comment::orderBy('created_at', 'desc')->paginate(20);
    	return view('admin-panel.comments', $com);
    }

    function deleteComment(request $request){
    	$delete = Comment::where('id', '=', $request->input('comment_id'))->delete();
		if($delete){
			return redirect()->back()->with("success", 'Comment deleted!');
		}else{
			return redirect()->back()->with("errors", 'Algum erro ocorreu.');
		}
    }

}
