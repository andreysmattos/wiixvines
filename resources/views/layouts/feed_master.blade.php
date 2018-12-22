<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>TibiaVines - Feed</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/fav-icon.png" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </script>
    <!----webfonts---->
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.4/jquery.lazy.min.js"></script>
        <!----//webfonts---->
    <!-- Global CSS for the page and tiles -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/feed_style.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontes.css') }}" rel="stylesheet">
    <!-- scripts -->
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <style>
      .like{
        background:url(/images/370fa7d2631d.png) no-repeat -105px -52px;;
    height: 24px;
    width: 24px;
  }

  .liked { 
    background:url(/images/370fa7d2631d.png) no-repeat  -105px -26px;
     height: 24px;
    width: 24px;
   }

    </style>


  </head>

  <body>
    <div class="page-wrapper @yield('bg_color')">
      @include('layouts.navbar')
          <div id="main" role="main">
      <div class="container">

<div class="col-md-12" align="center">
                  <div class="col-md-2 float-left" style="margin:0 0 0 0;padding:0 0 0 0;">
                      @yield('widgets')
                  </div>
                    <div class="col-md-10" >
                    @yield('feed')

                    </div>
            </div>
                    
                <!-- /.col-lg-9 -->
                </div>

            <!-- /.container -->
          @yield('footer')
</div>



        <!---//End-content---->
        <!----wookmark-scripts---->
        <script src="{{ asset('/js/jquery.imagesloaded.js') }}"></script>
        <script src="{{ asset('/js/jquery.wookmark.js') }}"></script>
        <!----//wookmark-scripts---->
<script type="text/javascript">
  var page = 1;
  $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
          page++;          
          loadMoreData(page);        
      }

  });


  function loadMoreData(page){
    $.ajax(
          {
              url: '?page=' + page,
              type: "get",
              beforeSend: function()
              {
                  $('.ajax-load').show();
              }
          })
          .done(function(data)
          {
                          if(data.html == " "){
                  $('.ajax-load').html("No more records found");
                  return;
              }              
              $('.ajax-load').hide();
              $("#post-data").append(data.html);
              $('.like-button').show();
               
               $("img.lazy").lazy({ 
  effect: "fadeIn",
          effectTime: 2000,
          threshold: 0
          });
               
          }) 

          .fail(function(jqXHR, ajaxOptions, thrownError)
          {
               
          });
  }
</script>

<script src="/jquery.lazy-master/jquery.lazy.js"></script>
<script>
  $(function(){
  $("img.lazy").lazy({ 
  effect: "fadeIn",
          effectTime: 2000,
          threshold: 0
          });
  $("img.lazy-none").lazy();
});

</script>
        <!----start-footer--->
        <!----//End-footer--->
        <!---//End-wrap---->
      </body>
    </html>