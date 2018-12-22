<!DOCTYPE HTML>
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
<style>
#main-channel
{
  margin-top: 0;
}
  .studio-edit
  {
    margin-top: 7em;
    border: 1px solid #ccc;
-webkit-box-shadow: 15px 15px 5px 0px rgba(221,221,221,1);
-moz-box-shadow: 15px 15px 5px 0px rgba(221,221,221,1);
box-shadow: 15px 15px 5px 0px rgba(221,221,221,1);

    height: 440px;
    width:100%;
    background-color:#fff;
    padding:20px;
  }
.menu-design a, a:hover {
  color: #000;
  text-decoration: none;
}

.menu_design {
margin-top:10px;
}

.active
{
  border-bottom: 1px solid #cf4500;
}
.item_nav {
  display: inline-block;
  position: relative;
  padding-bottom: 3px;
  margin-right: 10px;
}
.item_nav:last-child {
  margin-right: 0;
}

.item_nav:after {
  content: '';
  display: block;
  margin: auto;
  height: 1px;
  width: 0px;
  background: transparent;
  transition: width .5s ease, background-color .5s ease;
}
.item_nav:hover:after {
  width: 100%;
  background: #cf4500;
}
.studio-edit .avatardiv select
{
  width: 100%;
  height: 200px;
  overflow-x: scroll;
  overflow-y: hidden;
}
.studio-edit .avatardiv select option
{
  cursor: pointer;
  height: 150px;
  width: 150px;
  display:inline-block;
}
..studio-edit .avatardiv select option:checked
{
  background-color:#eee;
}
.studio-edit header
{
  /*margin-left: 10px;*/
  width: 100%;
  border-bottom: 1px #ccc solid;
  padding-bottom: 10px;
  font-size: 1.5em;
  font-weight: 600;
}
.studio-edit select
{
  width: 300px;
  height: 150px;
}
.studio-edit option
{
height: 50px;
}
.form-group
{
  margin-left: 10px;
  margin-top:10px;
}
.form-group .labeldad
{
  margin-right: 10px;
  font-weight: 550;
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
  <script type="text/javascript" src="/dist/emojionearea.js"></script>

</head>
  <body>
<input type="hidden" id="actualpage_id" class="actualpage_id" value="{{$idchself}}">
<div id="tudo_page col-md-12">
  <div id="allpage" style="background-color:{{$all_color}};">

{{-- NEW STUDIO --}}
<div class="container studio-edit">
    <header>Personalização</header>

{{Form::open(['route' => 'channelUpdate', 'files' => true])}}
  <button class="btn btn-success rounded float-right">Salvar <i class="fas fa-save"></i></button>  

                                            @foreach($data as $value)

<ul class="menu_design">
  <li class="item_nav active"><a href="#">Fundo</a></li>
  <li class="item_nav"><a href="#">Texto</a></li>
  <li class="item_nav"><a href="#">Avatar</a></li>
</ul>


<div class="fundodiv" style="display:none;">
<div class="row" style="margin:0;padding:0;">
    <div class="form-group" class="selectcolors">
    <label for="BGColor" class="labeldad">Toda página:</label><div class="clearfix"></div>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" checked="checked" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1" checked>Cor-solida</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Customizado</label>
</div>
    <select multiple class="form-control" id="BGColor">
    <option value="transparent" style="color:#000;background-color:#fff;">Transparent</option>
    <option value="#fff" style="color:#000;background-color:#fff;">White: #fff</option>    
    <option value="#42a5f5" style="background-color:#42a5f5;">light-blue: #42a5f5</option>
    <option value="#3f51b5" style="background-color:#3f51b5;">dark-blue: #3f51b5</option>    
    <option value="#aaa" style="background-color:#aaa;">light-grey: #aaa</option>
    <option value="#999" style="background-color:#999;">gray: #999</option>
    <option value="#4d4d4d" style="background-color:#4d4d4d;">gray-dark: #4d4d4d</option>
    <option value="#444" style="background-color:#444;">dark: #444</option>
    <option value="#9c27b0" style="background-color:#9c27b0;">purple: #9c27b0</option>
    <option value="#e91e63" style="background-color:#e91e63;">pink: #e91e63</option>
    <option value="#cf2fd0" style="background-color:#cf2fd0;">dark-pink: #cf2fd0</option>
    <option value="#ef5350" style="background-color:#ef5350;">red: #ef5350</option>
    <option value="#fdb244" style="background-color:#fdb244;">orange: #fdb244</option>
    <option value="#ffca28" style="background-color:#ffca28;">yellow: #ffca28</option>
    <option value="#9ccc65" style="background-color:#9ccc65;">green: #9ccc65</option>
    <option value="#009688" style="background-color:#009688;">teal: #009688</option>
    <option value="#26c6da" style="background-color:#26c6da;">cyan: #26c6da</option>
    <option value="#f8f9fa" style="color:#000;background-color:#f8f9fa;">light: #f8f9fa</option>
    <option value="#000" style="color:#fff;background-color:#000;">black: #000</option>
    </select>
  </div>

   <div class="form-group" class="selectcolors">
    <label for="BGColor" class="labeldad">Principal:</label><div class="clearfix"></div>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" checked="checked" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1" checked>Cor-solida</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Customizado</label>
</div>
    <select multiple class="form-control" id="BGColor">
    <option value="transparent" style="color:#000;background-color:#fff;">Transparent</option>
    <option value="#fff" style="color:#000;background-color:#fff;">White: #fff</option>    
    <option value="#42a5f5" style="background-color:#42a5f5;">light-blue: #42a5f5</option>
    <option value="#3f51b5" style="background-color:#3f51b5;">dark-blue: #3f51b5</option>    
    <option value="#aaa" style="background-color:#aaa;">light-grey: #aaa</option>
    <option value="#999" style="background-color:#999;">gray: #999</option>
    <option value="#4d4d4d" style="background-color:#4d4d4d;">gray-dark: #4d4d4d</option>
    <option value="#444" style="background-color:#444;">dark: #444</option>
    <option value="#9c27b0" style="background-color:#9c27b0;">purple: #9c27b0</option>
    <option value="#e91e63" style="background-color:#e91e63;">pink: #e91e63</option>
    <option value="#cf2fd0" style="background-color:#cf2fd0;">dark-pink: #cf2fd0</option>
    <option value="#ef5350" style="background-color:#ef5350;">red: #ef5350</option>
    <option value="#fdb244" style="background-color:#fdb244;">orange: #fdb244</option>
    <option value="#ffca28" style="background-color:#ffca28;">yellow: #ffca28</option>
    <option value="#9ccc65" style="background-color:#9ccc65;">green: #9ccc65</option>
    <option value="#009688" style="background-color:#009688;">teal: #009688</option>
    <option value="#26c6da" style="background-color:#26c6da;">cyan: #26c6da</option>
    <option value="#f8f9fa" style="color:#000;background-color:#f8f9fa;">light: #f8f9fa</option>
    <option value="#000" style="color:#fff;background-color:#000;">black: #000</option>
    </select>
  </div>

  <div class="form-group" class="selectcolors">
    <label for="BGColor" class="labeldad">Cabeçário:</label><div class="clearfix"></div>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" checked="checked" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1" checked>Cor-solida</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Customizado</label>
</div>
    <select multiple class="form-control" id="BGColor">
    <option value="transparent" style="color:#000;background-color:#fff;">Transparent</option>
    <option value="#fff" style="color:#000;background-color:#fff;">White: #fff</option>    
    <option value="#42a5f5" style="background-color:#42a5f5;">light-blue: #42a5f5</option>
    <option value="#3f51b5" style="background-color:#3f51b5;">dark-blue: #3f51b5</option>    
    <option value="#aaa" style="background-color:#aaa;">light-grey: #aaa</option>
    <option value="#999" style="background-color:#999;">gray: #999</option>
    <option value="#4d4d4d" style="background-color:#4d4d4d;">gray-dark: #4d4d4d</option>
    <option value="#444" style="background-color:#444;">dark: #444</option>
    <option value="#9c27b0" style="background-color:#9c27b0;">purple: #9c27b0</option>
    <option value="#e91e63" style="background-color:#e91e63;">pink: #e91e63</option>
    <option value="#cf2fd0" style="background-color:#cf2fd0;">dark-pink: #cf2fd0</option>
    <option value="#ef5350" style="background-color:#ef5350;">red: #ef5350</option>
    <option value="#fdb244" style="background-color:#fdb244;">orange: #fdb244</option>
    <option value="#ffca28" style="background-color:#ffca28;">yellow: #ffca28</option>
    <option value="#9ccc65" style="background-color:#9ccc65;">green: #9ccc65</option>
    <option value="#009688" style="background-color:#009688;">teal: #009688</option>
    <option value="#26c6da" style="background-color:#26c6da;">cyan: #26c6da</option>
    <option value="#f8f9fa" style="color:#000;background-color:#f8f9fa;">light: #f8f9fa</option>
    <option value="#000" style="color:#fff;background-color:#000;">black: #000</option>
    </select>
  </div>

  

  </div>
  <button class="btn btn-danger rounded float-right">Próximo <i class="fas fa-arrow-right"></i></button>

</div>

<div class="textodiv" style="display:none;">
  <div class="row" style="margin:0;padding:0;">
  <div class="form-group" class="selectcolors">
    <label for="BGColor" class="labeldad">Cor do cabeçário:</label><div class="clearfix"></div>

    <select multiple class="form-control" id="BGColor" >
    <option value="transparent" style="color:#000;background-color:#fff;">Transparent</option>
    <option value="#fff" style="color:#000;background-color:#fff;">White: #fff</option>    
    <option value="#42a5f5" style="background-color:#42a5f5;">light-blue: #42a5f5</option>
    <option value="#3f51b5" style="background-color:#3f51b5;">dark-blue: #3f51b5</option>    
    <option value="#aaa" style="background-color:#aaa;">light-grey: #aaa</option>
    <option value="#999" style="background-color:#999;">gray: #999</option>
    <option value="#4d4d4d" style="background-color:#4d4d4d;">gray-dark: #4d4d4d</option>
    <option value="#444" style="background-color:#444;">dark: #444</option>
    <option value="#9c27b0" style="background-color:#9c27b0;">purple: #9c27b0</option>
    <option value="#e91e63" style="background-color:#e91e63;">pink: #e91e63</option>
    <option value="#cf2fd0" style="background-color:#cf2fd0;">dark-pink: #cf2fd0</option>
    <option value="#ef5350" style="background-color:#ef5350;">red: #ef5350</option>
    <option value="#fdb244" style="background-color:#fdb244;">orange: #fdb244</option>
    <option value="#ffca28" style="background-color:#ffca28;">yellow: #ffca28</option>
    <option value="#9ccc65" style="background-color:#9ccc65;">green: #9ccc65</option>
    <option value="#009688" style="background-color:#009688;">teal: #009688</option>
    <option value="#26c6da" style="background-color:#26c6da;">cyan: #26c6da</option>
    <option value="#f8f9fa" style="color:#000;background-color:#f8f9fa;">light: #f8f9fa</option>
    <option value="#000" style="color:#fff;background-color:#000;">black: #000</option>
    </select>
  </div>

  <div class="form-group" class="selectcolors">
    <label for="BGColor" class="labeldad">Fonte do cabeçário:</label><div class="clearfix"></div>
        <select multiple class="form-control" id="BGColor">
    <option value="transparent" style="color:#000;background-color:#fff;">Transparent</option>
    <option value="#fff" style="color:#000;background-color:#fff;">White: #fff</option>    
    <option value="#42a5f5" style="background-color:#42a5f5;">light-blue: #42a5f5</option>
    <option value="#3f51b5" style="background-color:#3f51b5;">dark-blue: #3f51b5</option>    
    <option value="#aaa" style="background-color:#aaa;">light-grey: #aaa</option>
    <option value="#999" style="background-color:#999;">gray: #999</option>
    <option value="#4d4d4d" style="background-color:#4d4d4d;">gray-dark: #4d4d4d</option>
    <option value="#444" style="background-color:#444;">dark: #444</option>
    <option value="#9c27b0" style="background-color:#9c27b0;">purple: #9c27b0</option>
    <option value="#e91e63" style="background-color:#e91e63;">pink: #e91e63</option>
    <option value="#cf2fd0" style="background-color:#cf2fd0;">dark-pink: #cf2fd0</option>
    <option value="#ef5350" style="background-color:#ef5350;">red: #ef5350</option>
    <option value="#fdb244" style="background-color:#fdb244;">orange: #fdb244</option>
    <option value="#ffca28" style="background-color:#ffca28;">yellow: #ffca28</option>
    <option value="#9ccc65" style="background-color:#9ccc65;">green: #9ccc65</option>
    <option value="#009688" style="background-color:#009688;">teal: #009688</option>
    <option value="#26c6da" style="background-color:#26c6da;">cyan: #26c6da</option>
    <option value="#f8f9fa" style="color:#000;background-color:#f8f9fa;">light: #f8f9fa</option>
    <option value="#000" style="color:#fff;background-color:#000;">black: #000</option>
    </select>
  </div>
</div>

  <button class="btn btn-danger rounded float-right">Próximo <i class="fas fa-arrow-right"></i></button>  
</div>

<div class="avatardiv" style="display:block;">
  
  <div class="form-group" class="avatarselect">
    <label for="BGColor" class="labeldad">Acessórios para Avatar:</label><div class="clearfix"></div>
        <select multiple class="form-control" id="BGColor">
    <option value="transparent" style="">Nada</option>
    <option value="#fff" style="background-color:transparent;background-image:url(/images/avatar/cowboy_hat.png);">Cowboy</option>    
    <option value="#42a5f5" style="background-color:transparent;background-image:url(/images/avatar/cowboy_queen.png);">Cowboy Girl</option>
    <option value="#3f51b5" style="background-color:#dd614a;color:#fff;background-image:url(/images/avatar/police_hat.png);">Police Hat-50 Coins</option>
    <option value="#aaa" style="background-color:#dd614a;color:#fff;background-image:url(/images/avatar/wizard_black_hat.png);">Wizard Hat-100 Coins</option>
    <option value="#999" style="background-color:#dd614a;color:#fff;background-image:url(/images/avatar/black_hat_2.png);">Feru Hat-150 Coins</option>
    <option value="#4d4d4d" style="background-color:#dd614a;color:#fff;background-image:url(/images/avatar/king_crown.png);">King Crown-500 Coins</option>
    <option value="#444" style="background-color:#dd614a;color:#fff;background-image:url(/images/avatar/queen_crown.png);">Queen Crown-500 Coins</option>
    </select>
  </div>

  <button class="btn btn-danger rounded float-right">Salvar <i class="fas fa-save"></i></button>  

</div>



  @endforeach

</div>



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
              <div class="about-me-img" style="position: relative;">
                <a href="/{{$channel}}" >
                
                <div class="channel_avatar" style="background-image: url(/images/avatar/police_hat.png);position:absolute;width:149px;height: 150px;background-repeat: no-repeat;top:50%;margin-top:-200px;left:50%;margin-left:-75px;"></div>
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