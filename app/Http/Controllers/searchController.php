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
use DB;

class searchController extends BaseController
{
     private $vineview;

    public function __construct(Viewer $vineview){
        $this->vineview = $vineview;        
    
    }   


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   

  function searchServer(Request $request){

if($request->ajax())
 
{
 
$output="";
 
$products=DB::table('vines')->where('server','=',$request->search)->orderBy('id', 'desc')->paginate(16);
 
 if($request->search == 'all'){
    $products = DB::table('vines')->orderBy('id', 'desc')->paginate(16);
 }

if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top img-responsive" src="/images/uploads/'.$product->link.'" alt="'.$product->title.'">
                </a>
                </div>
                <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';

  }else{
 $q = explode('=', $product->link);
$output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg">
                </a>

                </div>

               <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';
 
}
}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }

    }

function searchTitle(Request $request){

if($request->ajax())
 
{
 
$output="";
 
$products=DB::table('vines')
->orwhere('server','=', $request->world_server)
->orWhere('playmode','=',$request->world_pvpmode)
->orWhere('pvptype', '=', $request->world_pvptype)
->where('title','LIKE','%'.$request->search.'%')
->orWhere('channel_name','LIKE','%'.$request->search.'%')
->orderBy('id', 'desc')
->paginate(16);

 if($request->search == ''){
$products=DB::table('vines')
->orwhere('server','=', $request->world_server)
->orWhere('playmode','=',$request->world_pvpmode)
->orWhere('pvptype', '=', $request->world_pvptype)
->where('title','LIKE','%'.$request->search.'%')
->orWhere('channel_name','LIKE','%'.$request->search.'%')
->orderBy('id', 'desc')
->paginate(16);

 }

if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top img-responsive" src="/images/uploads/'.$product->link.'" alt="'.$product->title.'">
                </a>
                </div>
                <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';

  }else{
 $q = explode('=', $product->link);
$output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg">
                </a>

                </div>

               <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';
 
}
}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }

    }



    function searchPreferences(Request $request){
        if($request->ajax())
 
{
 
$output="";

 
 if($request->search == 'recent'){


    $products = DB::table('vines')
    // ->where('server', '=', $request->server)
    // ->orWhere('playmode', '=', $request->mode)
    // ->orWhere('pvptype', '=', $request->type)
    ->orderBy('id', 'desc')
    ->get();


 }

 if($request->search == 'viewers'){

    $products = DB::table('vines')    
    // ->where('server', '=', $request->server)
    // ->orWhere('playmode', '=', $request->mode)
    // ->orWhere('pvptype', '=', $request->type)
    ->orderBy('view', 'desc')
    ->get();

 }

 if($request->search == 'trending'){

    $products = DB::table('vines')    
    // ->where('server', '=', $request->server)
    // ->orWhere('playmode', '=', $request->mode)
    // ->orWhere('pvptype', '=', $request->type)
    ->orderByRaw('view - created_at DESC')
    ->get();

 }


if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top img-responsive" src="/images/uploads/'.$product->link.'" alt="'.$product->title.'">
                </a>
                </div>
                <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';

  }else{
 $q = explode('=', $product->link);
$output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg">
                </a>

                </div>

               <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';
 
}
 
}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }

    }

 function searchMode(Request $request){
        if($request->ajax())
 
{
 
$output="";
 
 
switch ($request->search) {
    case 'pvp':
        $products = DB::table('vines')->where('playmode', '=', 'PvP')->orderBy('id', 'desc')->paginate(16);
               break;
    case 'pvm':
        $products = DB::table('vines')->where('playmode', '=', 'PvM')->orderBy('id', 'desc')->paginate(16);
               break;
    case 'quests':
        $products = DB::table('vines')->where('playmode', '=', 'Quests')->orderBy('id', 'desc')->paginate(16);
               break;
    
    default:
       $products = DB::table('vines')->orderBy('id', 'desc')->paginate(16);
        break;
}


if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top img-responsive" src="/images/uploads/'.$product->link.'" alt="'.$product->title.'">
                </a>
                </div>
                <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';

  }else{
 $q = explode('=', $product->link);
$output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg">
                </a>

                </div>

               <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';
 
}
 
}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }

    }


 function searchType(Request $request){
        if($request->ajax())
 
{
 
$output="";
 
 
$products = DB::table("vines")->where('pvptype', '=', $request->search)->orderBy('id', 'desc')->paginate(16);

 if($request->search == 'all'){
    $products = DB::table('vines')->orderBy('id', 'desc')->paginate(16);
 }


if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top img-responsive" src="/images/uploads/'.$product->link.'" alt="'.$product->title.'">
                </a>
                </div>
                <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';

  }else{
 $q = explode('=', $product->link);
$output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <div class="imgtop">

                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="hover-anim card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg">
                </a>

                </div>

               <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="'.$product->channel_name.'/'.$product->id.'" data-toggle="tooltip" data-placement="top" title="'.$product->channel_name.'"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>              
                  </a>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">'.Carbon::parse($product->created_at)->diffForHumans().'</small>
                  </div>

                </div>
              </div>
            </div>';
 
}
 
}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }

    }


public function showUser($usernick){
  $check = DB::table('users')->where('nick', '=', $usernick)->value('id');
  $created = DB::table('users')->where('id', '=', $check)->value('created_at');

  $channel = DB::table('channels')->where('user_id', '=', $check)->value('name');

  if(isset($channel)){
    return redirect('/'.$channel);
  }else{

  return view('profile_user', ['channel' => $channel, 'usernick' => $usernick, 'created' => $created]);
    }
  }




}

