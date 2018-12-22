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
  
            </head>
  
    <body>
        <div class="page-wrapper">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="-webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);">
       <div class="container">          

         <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="TibiaVines" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link @yield('posts_menu')" href="/">Posts
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item @yield('channel_menu')">
              <a class="nav-link" href="/channels">Channels
                <span class="sr-only">(current)</span>
              </a>
            </li>            
            @if(auth::check())
            <li class="nav-item @yield('feed_menu')">
              <a class="nav-link" href="/feed">Feed
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @endif
            @include('navbar.login_dropdown')
        </div>
      </div>
      <a href="#" class="btn btn-info sidebar-mobile-toggle d-md-none mr-auto">
           <i class="fas fa-align-left"></i>
                <span></span>
        </a>
          </nav>
    

                {{-- CREATE CHANNEL --}}

                <!-- FIM CREATE CHANNEL -->
        <!---start-wrap---->
        <!---start-header---->
        
<!---//End-header---->
<!---start-content---->
    <!-- INICIO MODEL -->
<!-- fim model  -->

<!-- FIM MODEL UPLOAD -->
<div id="main" role="main">

<div class="container">
      <div class="row">
        @yield('menu')
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