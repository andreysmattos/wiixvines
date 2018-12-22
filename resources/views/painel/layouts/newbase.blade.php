<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>TibiaVines - Feed</title>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/fav-icon.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        </script>
        <!----webfonts---->
        <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <!----//webfonts---->

        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">
        <!-- scripts -->
        <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
            {{-- EMOJIS --}}

  <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" media="screen">
  <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/assets/sprites/emojione.sprites.css" media="screen">-->
  <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen">
  <link rel="stylesheet" type="text/css" href="/dist/emojionearea.min.css" media="screen">
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
  <script type="text/javascript" src="/dist/emojionearea.js"></script>

  {{-- EMOJIS FIM --}}
  <style>
       #load {
    position: fixed;
    display: block;
    background:url(/images/giftv.gif) 50% 50% no-repeat;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
 }
 #tudo_page{
  opacity: 0.5;
 }

  </style>
   <script>
  $(document).ready(function(){

     function doPoll(){
      
$value= 'oi';
 
$.ajax({
 
type : 'get',
 
url : '{{route('fastinteraction')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#fast-interaction').html(data);
 
}
 
});
setTimeout(doPoll, 3000);
}

$(function() {
  setTimeout(doPoll, 3000);
});


     function doPollTwo(){
      
      $value= 'dois';
 
$.ajax({
 
type : 'get',
 
url : '{{route('interactionpage')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#interaction-page').html(data);
 
}
 
});
setTimeout(doPollTwo, 3000);
}

$(function() {
  setTimeout(doPollTwo, 3000);
});


     });

    </script>
    <script>
  function loading(){
     $('#load').css('display','none');
     setTimeout(() => {
    $('#tudo_page').css('opacity', '1');
}, this.animationDelay + 20);

}  

</script>
            </head>
   
    <body style="background-color:#12110f;
    background-image: url('/images/bg2.jpg');
    background-repeat: no-repeat;
    background-position: center top;
    background-attachment: fixed;" onload="loading()">
    <div id="load"></div>
    <div id="tudo_page">
        <div class="page-wrapper">
   @include("layouts.navbar")   





<!-- fim model  -->

<!-- FIM MODEL UPLOAD -->
<div id="main" role="main">

<div class="container">
      <div class="row">
        @include('painel.sidebar')
               <!-- /.col-lg-3 -->

        <div class="col-lg-9">

                @yield('page')
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->


</div>

</div>
</div>
</div>













<!---//End-content---->
<!----wookmark-scripts---->
<script src="{{ asset('/js/jquery.imagesloaded.js') }}"></script>
<script src="{{ asset('/js/jquery.wookmark.js') }}"></script>
<script src="{{asset('/js/panel/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{asset('/js/panel/chart.js/chart.min.js') }}"></script>
<script src="{{asset('/js/carbon.js') }}"></script>
<script src="{{asset('/js/demo.js') }}"></script>



<script type="text/javascript">

$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
        /* Check the location of each desired element */
        $('li').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });
    
});


          </script>
          <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#desc").emojioneArea({

      });
    });
  </script>

<!----//wookmark-scripts---->
<!----start-footer--->
<!----//End-footer--->
<!---//End-wrap---->
</body>
</html>