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
                
                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="card-img-top img-responsive" style="max-width:100%;height:auto;width:210px;height:118px;" src="/images/uploads/'.$product->link.'" alt="">
                </a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                <a href="'.$product->channel_name.'/'.$product->id.'"><img class="card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>

                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
 
$products=DB::table('vines')->where('title','LIKE','%'.$request->search.'%')->orWhere('channel_name','LIKE','%'.$request->search.'%')->orderBy('id', 'desc')->paginate(16);
 
 if($request->search == 'all'){
    $products = DB::table('vines')->orderBy('id', 'desc')->paginate(16);
 }

if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="card-img-top img-responsive" style="max-width:100%;height:auto;width:210px;height:118px;" src="/images/uploads/'.$product->link.'" alt="">
                </a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                 <a href="'.$product->channel_name.'/'.$product->id.'">
                 <img class="card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>
               <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
    $products = DB::table('vines')->orderBy('id', 'desc')->paginate(16);
 }
 if($request->search == 'viewed'){
    $products = DB::table('vines')->orderBy('view', 'desc')->paginate(16);
 }

if($products)
 
{
 
foreach ($products as $key => $product) {
  if($product->type == '0'){

    $output.='<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                
                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="card-img-top img-responsive" style="max-width:100%;height:auto;width:210px;height:118px;" src="/images/uploads/'.$product->link.'" alt="">
                </a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                <a href="'.$product->channel_name.'/'.$product->id.'"><img class="card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="card-img-top img-responsive" style="max-width:100%;height:auto;width:210px;height:118px;" src="/images/uploads/'.$product->link.'" alt="">
                </a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                <a href="'.$product->channel_name.'/'.$product->id.'"><img class="card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                <a href="'.$product->channel_name.'/'.$product->id.'">
                <img class="card-img-top img-responsive" style="max-width:100%;height:auto;width:210px;height:118px;" src="/images/uploads/'.$product->link.'" alt="">
                </a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-image"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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
                
                <a href="'.$product->channel_name.'/'.$product->id.'"><img class="card-img-top" src="http://img.youtube.com/vi/'.$q[1].'/hqdefault.jpg" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>
                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="#"><i class="fas fa-video"></i> '.$product->title.'</a>
                  </span><div class="clearfix"></div> 
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> '.$product->server.'</small>
                  <div class="clearfix"></div>
                  <a href="/'.$product->channel_name.'" class="hover-href">
                  <small><i class="fas fa-book"></i> '.$product->channel_name.'</small>
                  </a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> '.$product->view.'</small>
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

