<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TibiaVines</title>

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
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/new_style.css')}}">
    <link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/b10.css')}}">
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
</style>
  </head>
  <body>


<div id="tudo_page">
<div id="overlay">
    <div id="progstat" style="display: none;"></div>
    <div id="progress"></div>
  </div>
    <div class="page-wrapper @yield('bg_color')">
      
      @include("layouts.navbar")


      @if (App::isLocale('pt-BR'))
        @include('includes.modals_pt-br')
      @elseif(App::isLocale('es'))
        @include('includes.modals_es')
      @else
        @include('includes.modals')
      @endif

    <div id="main" role="main">
  
      @yield('main_content')       

    </div>
  </div>

</div>



<!---//End-content---->
<!----wookmark-scripts---->

<script>
  $(function(){

  $("img.lazy").lazy();
  $("img.lazy-fade").lazy({


  effect: "fadeIn",
          effectTime: 2000,
          threshold : 0
          });
  });
 
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
</script>
    <script src="{{asset('/jquery.lazy-master/jquery.lazy.min.js')}}"></script> 
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('/js/jquery.imagesloaded.js') }}"></script>
    <script src="{{ asset('/js/jquery.wookmark.js') }}"></script>
    @include("includes.js")
</body>
</html>