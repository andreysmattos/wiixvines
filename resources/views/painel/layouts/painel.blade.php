<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TibiaVines - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">


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

    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset('/images/new-favicon.ico')}}" type="image/x-icon">


    <link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>

    <link href="{{ asset('/lightbox/ekko-lightbox.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('/css/painel_css.css')}}">
    <link rel="stylesheet" href="{{asset('/css/b10.css')}}">


{{-- EMOJIS --}}

  <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" media="screen">
  <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/assets/sprites/emojione.sprites.css" media="screen">-->
  <link rel="stylesheet" type="text/css" href="{{asset('stylesheet.css')}}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{asset('/dist/emojionearea.min.css')}}" media="screen">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="http://mervick.github.io/lib/google-code-prettify/skins/tomorrow.css" media="screen">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/lib/js/emojione.min.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"></script>-->
  <!--<script type="text/javascript" src="../node_modules/emojione/lib/js/emojione.js"></script>-->
  <script type="text/javascript" src="http://mervick.github.io/lib/google-code-prettify/prettify.js"></script>
  <!--<script>
    window.emojioneVersion = "3.1";
  </script>-->
  <script type="text/javascript" src="{{asset('/dist/emojionearea.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#desc").emojioneArea({

      });
    });
  </script>
  
</head>
<body style="@yield('background')">
   <div id="overlay">
    <div id="progstat" style="display: none;"></div>
    <div id="progress"></div>
  </div>


<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content" style="background-color:#525252;color:#ff3000;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">      
      <div class="modal-body" style="padding:0px 0px 20px 0px;">
        <button type="button" class="close" style="color:#fff;padding:10px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
          </div>
  </div>
</div>


    @include('layouts.navbar')
 <div id="app">
        

  @yield('content')

    
    </div>

  {{-- @yield('footer') --}}
</div>


        <script type="text/javascript">  
            ;(function(){
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

$ (document).ready (function () {
  $ (".modal a").not (".dropdown-toggle").on ("click", function () {
    $ (".modal").modal ("hide");
  });
});

$(document).ready(function(){
$('.albuns-row').show();
$('.albuns-row').css('margin-left', '0%');



$('.fotos-btn').click(function(){
$('.albuns-btn').removeClass('active-btn');
$('.albuns-row').css('margin-left', '100%');

$('.albuns-row').hide();


$('.fotos-btn').addClass('active-btn');
$('.fotos-row').show();
$('.fotos-row').css('opacity', '1');




});
$('.albuns-btn').click(function(){
    $('.fotos-btn').removeClass('active-btn');
    $('.fotos-row').hide();


    $('.albuns-btn').addClass('active-btn');


    $('.albuns-row').show();
$('.albuns-row').css('margin-left', '0%');


});
});


$(function() {
  $('[data-toggle="tooltip"]').tooltip()

    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');   
    });   
    $('.popbg').on('click', function(){
        var bgname = $(this).css('background-image');
        var retorno = bgname.split("\"");
        $('.imagepreview').attr('src', retorno[1]);
      $('#imagemodal').modal('show');   
      // alert(retorno[1]);
  });
});


    $(document).ready(function(){
       

    $('.change-color').change(
    function (){
        var color = $('option:selected',this).css('background-color');
        $(this).css('background-color',color);

    }
).change();

    
    })

</script>
<script type="text/javascript">
        // duration of scroll animation
var scrollDuration = 1000;
// paddles
var leftPaddle = document.getElementsByClassName('left-paddle');
var rightPaddle = document.getElementsByClassName('right-paddle');
// get items dimensions
var itemsLength = $('.item').length;
var itemSize = $('.item').outerWidth(true);
// get some relevant size for the paddle triggering point
var paddleMargin = 20;

// get wrapper width
var getMenuWrapperSize = function() {
    return $('.menu-wrapper').outerWidth();
}
var menuWrapperSize = getMenuWrapperSize();
// the wrapper is responsive
$(window).on('resize', function() {
    menuWrapperSize = getMenuWrapperSize();
});
// size of the visible part of the menu is equal as the wrapper size 
var menuVisibleSize = menuWrapperSize;

// get total width of all menu items
var getMenuSize = function() {
    return itemsLength * itemSize;
};
var menuSize = getMenuSize();
// get how much of menu is invisible
var menuInvisibleSize = menuSize - menuWrapperSize;

// get how much have we scrolled to the left
var getMenuPosition = function() {
    return $('.menu').scrollLeft();
};

// finally, what happens when we are actually scrolling the menu
$('.menu').on('scroll', function() {

    // get how much of menu is invisible
    menuInvisibleSize = menuSize - menuWrapperSize;
    // get how much have we scrolled so far
    var menuPosition = getMenuPosition();

    var menuEndOffset = menuInvisibleSize - paddleMargin;

    // show & hide the paddles 
    // depending on scroll position
    if (menuPosition <= paddleMargin) {
        $(leftPaddle).addClass('hidden');
        $(rightPaddle).removeClass('hidden');
    } else if (menuPosition < menuEndOffset) {
        // show both paddles in the middle
        $(leftPaddle).removeClass('hidden');
        $(rightPaddle).removeClass('hidden');
    } else if (menuPosition >= menuEndOffset) {
        $(leftPaddle).removeClass('hidden');
        $(rightPaddle).addClass('hidden');
}

    // print important values
    $('#print-wrapper-size span').text(menuWrapperSize);
    $('#print-menu-size span').text(menuSize);
    $('#print-menu-invisible-size span').text(menuInvisibleSize);
    $('#print-menu-position span').text(menuPosition);

});

// scroll to left
$(rightPaddle).on('click', function() {
    $('.menu').animate( { scrollLeft: menuInvisibleSize}, scrollDuration);
});

// scroll to right
$(leftPaddle).on('click', function() {
    $('.menu').animate( { scrollLeft: '0' }, scrollDuration);
});

</script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                   leftArrow: "<span style='color:#ff3000;'>❮</span>",
                   rightArrow: "<span style='color:#ff3000;'>❯</span>",
                });
            });
</script>
<script>
// jQuery.noConflict(); 

  jQuery(function ($) {
 $(".sidebar-dropdown > a").click(function () {

        $(".sidebar-submenu").slideUp(200);
        if ($(this).parent().hasClass("active")) {
            $(".sidebar-dropdown").removeClass("active");
            $(this).parent().removeClass("active");

        } else {

            $(".sidebar-dropdown").removeClass("active");
            $(this).next(".sidebar-submenu").slideDown(200);
            $(this).parent().addClass("active");
        }

    });

  
   
});
</script>
<script>
  $(document).ready(function(){
  $('#btn-sidemodal').click(function(){
    $('.modalcolapse-show').collapse('show');
    $('.overlay-side').fadeIn();

  })
  $('.overlay-side').on('click', function(){
    $('.modalcolapse-show').collapse('hide');
    $('.overlay-side').fadeOut();

  })
  $('.button-exitsidebarmodal').click(function(){
    $('.modalcolapse-show').collapse('hide');
    $('.overlay-side').fadeOut();
  })
  })
</script>


    
  
</body>
</html>
