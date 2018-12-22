<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Viewer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App;

class Controller extends BaseController
{
     private $vineview;

    public function __construct(Viewer $vineview){
        $this->vineview = $vineview;        
    
    }   


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function getvideo()
    {
        $locale = App::getLocale();
        App::setLocale($locale);
    	$data['data'] = DB::table('vines')->orderBy('id', 'desc')->Paginate(24);
        $worlds['worlds'] = DB::table('vines')->select('server')
            ->distinct()->orderBy('server', 'asc')->get();

        $openpvp['openpvp'] = DB::table('vines')->where('pvptype', '=', 'Open PvP')->orderBy('view', 'desc')->limit(5)->get();

        $npvp['npvp'] = DB::table('vines')->where('pvptype', '=', 'Optional PvP')->orderBy('view', 'desc')->limit(5)->get();


         if(count($data) > 0)
    	{
    		return view('home', $data, $worlds)->with($openpvp)->with($npvp);
    	}
    	else
    	{

    		return view('home', $data, $worlds, $openpvp, $npvp);
    	}
        
  
    }

    function channels(){
        $channels['channels'] = DB::table('channels')->orderBy('subscribe', 'desc')->paginate(16);

        return view('channels', $channels);
    }

    
function getWatch()
    {
    if (isset($_GET['v']))
        {
        $data['data'] = DB::table('vines')->where('id', '=', $_GET['v'])->get();
        $checkexist = DB::table('vines')->where('id', '=', $_GET['v'])->value('id');
        if (isset($checkexist))
            {
            $server = DB::table('vines')->where('id', '=', $_GET['v'])->value('server');
            $others['others'] = DB::table('vines')->where('server', '=', $server)->where('id', '!=', $checkexist)->limit(4)->get();
            $otherexist = DB::table('vines')->where('server', '=', $server)->where('id', '!=', $checkexist)->first();
            if (!$otherexist)
                {
                $others['others'] = DB::table('vines')->where('id', '!=', $checkexist)->limit(4)->get();
                }

            $ts = time() - 60;
            DB::table('totalview')->where('created_at', '<', Carbon::now()->subMinutes(600)->toDateTimeString())->delete();
            $check = DB::table('totalview')->where('visit_ip', '=', $_SERVER['REMOTE_ADDR'])->where('vine_id', '=', $_GET['v'])->get();       
            if (count($check) < 1)
                {
                $dataForm = ['vine_id' => $_GET['v'], 'visit_ip' => $_SERVER['REMOTE_ADDR'], ];
                $insert = $this->vineview->create($dataForm);
                $update = DB::table('vines')->where('id', '=', $_GET['v'])->increment('view');
                }

            return view('watch', $data, $others);
            }
          else
            {
            return view('404_watch');
            }
        }
      else
        {
        $_GET['v'] = 0;
        return view('404_watch');
        }
    }
}

