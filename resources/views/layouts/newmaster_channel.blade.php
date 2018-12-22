<!DOCTYPE HTML>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tv - @yield('title')</title>

    <!--PARA ACEITAR ACENTOS-->
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
          
          <meta property="og:locale" content="en_US">

          <!--URL DO SITE-->
          <meta property="og:url" content="https://www.tibiavines.com/">

          <!--TÍTULO E NOME DO SITE-->
          <meta property="og:title" content="Tibia Vines">
          <meta property="og:site_name" content="Tibia Vines">

          <!-- DESCRIÇÃO DO SITE-->
          <meta property="og:description" content="Enjoy the Wars, Hunts, Videos, photos from Tibia players">

          <!-- IMAGEM DO SITE -->
          <meta property="og:image" content="http://www.tibiavines.com/images/preview.jpg"/>
          <meta property="og:image:type" content="image/jpg">
          <meta property="og:image:width" content="200">
          <meta property="og:image:height" content="200"> 
          <meta property="og:type" content="website">

    


    <link rel="shortcut icon" href="{{asset('/images/new-favicon.ico')}}" type="image/x-icon">
  <!----webfonts---->
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <!----//webfonts---->

    <!-- Global CSS for the page and tiles -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/css/all.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/b10.css')}}">
    

  
    {{-- Styles --}}
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">      
    <link href="{{ asset('/css/styles-mobile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/newch_style.css")}}">
<script>
$(document).keydown(function(e) {
    switch(e.which) {
        case 37:
           document.getElementById("prevLink").click();
        break;

        case 39: 
          document.getElementById("nextLink").click();
        break;
        default: return; 
    }
    e.preventDefault(); 
});
</script>

<script>
              (function(){
  function id(v){return document.getElementById(v); }
  function loadbar() {
    var ovrl = id("overlay"),
        prog = id("progress"),
        stat = id("progstat"),
        img = document.images,
        c = 0;
        tot = img.length;

    function imgLoaded(){
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      prog.style.width = perc;
      stat.innerHTML = "Loading "+ perc;
      if(c===tot) return doneLoading();
    }
    function doneLoading(){
      ovrl.style.opacity = 0;
      setTimeout(function(){ 
        ovrl.style.display = "none";
      }, 1200);
    }
    for(var i=0; i<tot; i++) {
      var tImg     = new Image();
      tImg.onload  = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src     = img[i].src;
    }    
  }
  document.addEventListener('DOMContentLoaded', loadbar, false);
}());
</script>
<style>
#overlay{
  position:fixed;
  z-index:99999;
  top:0;
  left:0;
  bottom:0;
  right:0;
  /*background:rgba(0,0,0,0.9);*/
  transition: 1s 0.4s;
  }
  #progress{
  height: 5px;
  background:#ff3000;
  z-index: 999999999999999999999999999;
  position:fixed;
  width:0;               
  top:0;
  left:0;
}
#progstat{
  font-size:0.7em;
  letter-spacing: 3px;
  position:absolute;
  top:50%;
  margin-top:-40px;
  width:100%;
  text-align:center;
  color:#000;
}
  .btn-find
{
  font-weight:500;
  border:none;
  width: 100%;
  height: 38px;
  font-size: 1em;
  padding:10px;
  cursor: pointer;
  display:inline-block;
  text-decoration: none;
  color:#fff;
  box-shadow:0 5px 0 #8e2f00;
  background:#cf4500;
  border-radius: 10px;
}
.btn-find:hover
{
  background-color:#b73e01;
}
.btn-find:active
{
  position: relative;
  top:5px;
  box-shadow: none;
  outline:none;
  border:none;
}
.btn-find:focus
{
    outline:none;
}
</style>


    {{-- EMOJIS --}}

  <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" media="screen">
  <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/assets/sprites/emojione.sprites.css" media="screen">-->
   <link rel="stylesheet" type="text/css" href="/dist/emojionearea.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="https://mervick.github.io/lib/google-code-prettify/skins/tomorrow.css" media="screen">

  <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/lib/js/emojione.min.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"></script>-->
  <!--<script type="text/javascript" src="../node_modules/emojione/lib/js/emojione.js"></script>-->
  <script type="text/javascript" src="https://mervick.github.io/lib/google-code-prettify/prettify.js"></script>
  <!--<script>
    window.emojioneVersion = "3.1";
  </script>-->
  <script type="text/javascript" src="{{asset('/dist/emojionearea.js')}}"></script>
</head>
  <body>
    <div id="overlay">
    <div id="progstat" style="display: none;"></div>
    <div id="progress"></div>
  </div>
<input type="hidden" id="actualpage_id" class="actualpage_id" value="{{$idchself}}">
<div id="tudo_page col-md-12">
  <div id="allpage" style="background-color:{{$all_color}};">

@if(count($recom) > 0)
<button type="button" id="toggle_inter" class="btn btn-danger text-right" style="position:fixed;margin-top:6em;">
  <i class="fas fa-caret-left hide-inter" style="display:block;"></i>
  <i class="fas fa-caret-right show-inter" style="display:none;"></i>
</button>

<div class="inter-sidebar rounded-right col-md-1 col-sm-11" style="z-index:9999;padding:0 0 0 0;margin-top:8em;overflow-y: auto;position:fixed;margin-left: 0;max-height: 80%;">

    <div class="card col-md-12" style="padding: 0 0 0 0;margin:0 0 0 0;">
      <div class="card-body" style="background-color:#fff;height: 100%;">


      <p class="card-text">
        @foreach($recom->unique('channel_name') as $reco)
        <div class="section mb-2">
          <a href="/{{$reco->channel_name}}/{{$reco->id}}">
        @if($reco->type=='0')
        
          <img src="/images/default.jpg" data-src="/images/uploads/{{$reco->link}}" alt="{{$reco->title}}" class="lazy img-responsive" style="width: 100%;height:auto;">
          
        

          @else
          <?php $q = explode('=', $reco->link);?>
          <img class="lazy img-responsive" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" alt="" style="width: 100%;height:auto;">

          @endif
        <span class="font-weight-bold">{{$reco->channel_name}}</span>
        </a>
        </div>
        @endforeach

      </p>
      </div>
    </div>
</div>
@endif

@yield('page-wrapper')

@include('layouts.navbar')

<div id="main-channel" role="main">

  <div class="col-md-12" align="center">


  <div class="about-me-mobile">
    <div class="row">
    <img src="{{asset('/images/profile-images/'.$profileimage.'')}}" alt="">
    <div class="channel-txt">
      <p class="channel-name">{{$channel}}</p>
      
      <small>
         @if (App::isLocale('pt-BR'))
    <span>{{$subscribe}} 
    @if($subscribe > 1){
  seguidores @else
  seguidor
@endif
</span>
@elseif(App::isLocale('es'))
    <span>{{$subscribe}} @if($subscribe > 1){
  seguidores @else
  seguidor
@endif
</span>
@else
    <span>{{$subscribe}} @if($subscribe > 1){
  followers @else
  follower
@endif
</span>
@endif

      </small>
    </div>
    <div class="follow-tag">
      @if(auth::check() && auth::user()->channel_name != null && auth::user()->channel_name != $name)

<button id="follow-button" class="follow-button font-weight-bold text-center text-white btn btn-subscribe rounded" style="font-size: 14px;
    font-weight: 600;padding:0px 24px 0px 24px;background-color:#da521e;display:none;">@if (App::isLocale('pt-BR'))
    Seguir
@elseif(App::isLocale('es'))
    Seguir
@else
    Follow
@endif</button>
<button id="unfollow-button" class="unfollow-button  font-weight-bold text-center btn btn-subscribe rounded" style="font-size: 14px;
    font-weight: 600;padding:0px 24px 0px 24px;background-color:transparent;border:solid 1px #e3ab96;display:none;">
    <i class="fas fa-check"></i>
    @if (App::isLocale('pt-BR'))
    Seguindo
@elseif(App::isLocale('es'))
    Siguiendo
@else
    Following
    @endif
    
</button>
@else
nothing
@endif
    </div>
    
    </div>
    
  </div>



    @if($bg_header == 'default')
<div class="col-md-8 col-sm-12 col-xs-12 text-center" style="background-color:{{$bg_header}};height:200px;padding: 0 0 0 0;">
@else
<div class="col-md-8 col-sm-12 col-xs-12 text-center">
@endif

        {{-- <img src="/images/uploads/1534998203.png" style="width: 100%;" height="200"> --}}

        <h1 class="font-weight-bold" style="font-size:5em;word-break: break-all;color:{{$header_text_color}};display: inline-block;
  vertical-align: middle;
  line-height: normal;">{{$channel_nick}}</h1>
      </div>
      </div>


<div class="kotha-default-content">

  {{-- <div class="container"> --}}

    <div class="row">
      
      <div class="col-md-8 col-sm-12 col-xs-12" id="article_side">


          @yield('loop_article')
        
        
        


      </div>


      {{-- SIDEBAR EAST --}}
      {{-- SIDEBAR EAST --}}
      {{-- SIDEBAR EAST --}}
      {{-- SIDEBAR EAST --}}
      {{-- SIDEBAR EAST --}}


      <div class="col-sm-4" id="desktop_side">
        <div class="kotha-sidebar">
          @yield('profile_bg')
            <div class="about-me-content">
              <div class="about-me-img">
                <a href="/{{$channel}}">

                @yield('channel_profile')

                </a>



                <h2 class="text-uppercase">
                  <b>@yield('channel_name')</b>
                  <div class="clearfix"></div>
                  <small style="font-size: 0.6em;">
                                   @if (App::isLocale('pt-BR'))
    <span>{{$subscribe}} 
    @if($subscribe > 1){
  seguidores @else
  seguidor
@endif
</span>
@elseif(App::isLocale('es'))
    <span>{{$subscribe}} @if($subscribe > 1){
  seguidores @else
  seguidor
@endif
</span>
@else
    <span>{{$subscribe}} @if($subscribe > 1){
  followers @else
  follower
@endif
</span>
@endif</small>
                </h2>

                <p>@yield('channel_desc')</p>
              </div>
            </div>
            <div class="social-share">
              <ul class="list-inline">
                

@if(auth::check() && auth::user()->channel_name != null && strtolower(auth::user()->channel_name) != strtolower($channel))

<button id="follow-button" class="follow-button font-weight-bold text-center text-white btn btn-subscribe rounded" style="font-size: 14px;
    font-weight: 600;padding:0px 24px 0px 24px;background-color:#da521e;display:none;">
    @if (App::isLocale('pt-BR'))
    Seguir
@elseif(App::isLocale('es'))
    Seguir
@else
    Follow
@endif
</button>


<button id="unfollow-button" class="unfollow-button  font-weight-bold text-center btn btn-subscribe rounded" style="font-size: 14px;
    font-weight: 600;padding:0px 24px 0px 24px;background-color:transparent;border:solid 1px #e3ab96;display:none;">
    <i class="fas fa-check"></i>
    @if (App::isLocale('pt-BR'))
    Seguindo
@elseif(App::isLocale('es'))
    Siguiendo
@else
    Following
    @endif
    
</button>
@else

@endif



                {{-- <li class="list-inline-item"><a class="s-facebook" href=""><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a class="s-twitter" href=""><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a class="s-google-plus" href=""><i class="fa fa-google-plus"></i></a></li>
                <li class="list-inline-item"><a class="s-linkedin" href=""><i class="fa fa-linkedin"></i></a></li>
                <li class="list-inline-item"><a class="s-instagram" href=""><i class="fa fa-instagram"></i></a></li> --}}
              </ul>
            </div>
          </aside>

          
          <aside class="widget add-widget" style="background-color:#fff;">
            <h2 class="widget-title text-uppercase text-center">
              @if (App::isLocale('pt-BR'))
    Recomendados
@elseif(App::isLocale('es'))
    Recomendado
@else
    Recommended
    @endif
</button>

            </h2>
            <div class="row" style="margin:0;padding:0;">
            @for($i=0;$i<9;$i++)
            <a href="">
            <div style="display:block;">
              {{-- <a href=""> --}}
              
              <img src="{{asset('/images/profile-images/default.png')}}" alt="" class="mb-1 mr-1" style="height:101px;width: 101px;">
              <div class="body-recomend" style="    background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7));position:absolute;    color: rgb(255, 255, 255);margin-top:-25px;width: 101px;">
                <div class="names" style="padding-left:10px;">
                  Ricardo
                </div>                
              </div>
              
            
              {{-- </a> --}}
            </div>
            </a>
            @endfor
            </div>
          </aside>

        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div>
<footer>
  <div class="container-fluid text-center ft-copyright">
    <p>&copy; 2018 <a href="/">Tibia Vines </a></p>
  </div>
</footer>
<div class="scroll-up">
  <a href="#"><i class="fa fa-angle-up"></i></a>
</div>

</div>

</div>



<!--//Script//-->
    <script src="{{ asset('/js/jquery.imagesloaded.js') }}"></script>
    <script src="{{ asset('/js/jquery.wookmark.js') }}"></script>
    @include('includes.channel-js')



</body>
</html>