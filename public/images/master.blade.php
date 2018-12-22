<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
	<head>
		<title>TibiaVines - Feed</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">

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




		<link rel="shortcut icon" href="/images/new-favicon.ico" type="image/x-icon">
<link rel="icon" href="/images/new-favicon.ico" type="image/x-icon">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous"></script>
		<!----//webfonts---->

		<!-- Global CSS for the page and tiles -->
		<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
		<link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4248007486386492",
    enable_page_level_ads: true
  });
</script>
		<!-- scripts -->
		<script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.4/jquery.lazy.min.js"></script>
    <script src="/jquery.lazy-master/jquery.lazy.js"></script>
<script>
  $(function(){
  $("img.lazy-fade").lazy();
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

    <script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<style>
  .masonry-column {
  padding: 0 1px;
}

.masonry-grid > div .thumbnail {
  margin: 5px 1px;
}

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

 <script type="text/javascript">
  $(document).ready(function(){

     $('#searchAll').keyup(function(){
      $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchAll')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});
});


  $('#servers').change(function(){
      $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchSv')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});
 


  });


    $('#preferences').change(function(){
      $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('preferences')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});
 


  });


});


</script>
<script> 
    $(document).ready(function(){
  $('#radioplaymode input[name=playmode]').click(function(){

        $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchMode')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});

});
 
    $('#pvptype input[name=pvptype]').click(function(){

        $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchType')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});

});

 });

</script>
<script type="text/javascript">
 
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
</script>
	</head>
	<body style="background-color: #131210;
    background-image: url('/images/bg3.jpg');
    background-repeat: no-repeat;
    background-position: center top;
    background-attachment: fixed;" onload="loading()">

<div id="load"></div>
<div id="tudo_page">

    <div class="page-wrapper @yield('bg_color')">
   @include("layouts.navbar")
				{{-- CREATE CHANNEL --}}

				<!-- FIM CREATE CHANNEL -->
		<!---start-wrap---->
		<!---start-header---->
		
<!---//End-header---->
<!---start-content---->
	<!-- INICIO MODEL -->

		@if(Auth::check() && auth::user()->channel_name == null && (session()->has('errorch') || (isset ($errors) && count($errors) > 0)))

		<script type="text/javascript">
$(window).on('load',function(){
        $('#exampleModal').modal('show');

 });
		</script>
		<script>$(document).ready(function(){
    
$("#recipient-name").keyup(function(){
var titleval = $("#recipient-name").val();
$("#keycode").val(titleval);
});
$()

});</script>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">First create your channel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <form method="POST" action="{{ route('channel.store') }}">
        {{ csrf_field() }}

              @if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif

          <div class="form-group">
            <label for="recipient-name" class="col-form-label {{ $errors->has('name') ? 'text-danger' : '' }}">Name:</label>
            <input type="text" class="form-control col-md-12" name="name" id="recipient-name" autocomplete="off" required placeholder="{{auth::user()->nick}}" maxlength="25" minlength="4">
                                
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">KeyCode:{{ $errors->has('keycode') ? ' has-error' : '' }}</label>
            <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="fm">TibiaVines.com/</span>
                  </div>
                  <input type="text" class="form-control" id="keycode" name="keycode" autocomplete='off' required maxlength="15" minlength="4" readonly>

                </div>
          </div>
          <div class="form-group">
            <label for="rules" class="col-form-label">Terms of use-please read:</label>
            <textarea id="rules" class="form-control" rows="6" disabled>1: We only accept vines from the owner of the same.
2: Offensive or third-party names are not allowed in 'Name', 'Description', 'Thumbmail', 'Title' of the channel or vine.
3: To add a video in your channel it is necessary to have the 'Keycode' shown above in the description.
4: As of the creation of the channel you will make your 'Nick' public, and can be displayed by anyone who wants to visit your channel.
5: TibiaVines is a platform especially dedicated to Tibia, so we do not accept anything that does not have a direct relation to the game.
6: You can only enable your channel for rewards after having at least one vine with one thousand (1000) vizualizações.
7: We check IP history by channel periodically, thus not being allowed to connect to another login without authorization.
8: We will never ask for personal data for our users.
9: Never enter your account or game password in any field.
-------------
If you do not agree or do not want to follow any of these rules, please do not continue the operation.
            </textarea>
           <p class="text-danger">* By clicking 'Create Channel' you agree to the terms of use.</p>
        </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Create Channel</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{session()->forget('errorch')}}
@endif


@if(session()->has('back_msg'))

		<script type="text/javascript">
$(window).on('load',function(){
        $('#exampleModal').modal('show');

 });
		</script>
		<script>$(document).ready(function(){
    
$("#recipient-name").keyup(function(){
var titleval = $("#recipient-name").val();
$("#keycode").val(titleval);
});
$()

});</script>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Huh...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    	{{session()->get('back_msg')}}
    </div>
  </div>
</div>
</div>
{{session()->forget('back_msg')}}
@endif

<!-- fim model  -->

		

<!-- FIM MODEL UPLOAD -->




		<div id="main" role="main">

 <div class="@yield('ch_color') container pl-5 pr-5 rounded">

      <div class="row">

       <div class="@yield('col-padrao') border border-light" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); background:url('/images/scroll.gif');background-color:#f6f7f2;padding-top: 13px;
    padding-right: 18px;
    padding-bottom: 13px;
    padding-left: 28px;">

          
				<h3><b>@yield('findmode')</b></h3>
          <div class="row" id="loopvines">
			@yield('loop_vines')
            
          </div>
          @yield('paginator')
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
<div class="col-lg-3" style="color:#5A2800;-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); background:url('/images/scroll.gif');background-color:#f6f7f2;padding-top: 13px;
    padding-right: 18px;
    padding-bottom: 13px;
    padding-left: 28px;" @yield('style_search') >
  @yield('search_att')


      </div>

        </div>
        <!-- /.col-lg-3 -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


</div>




@yield('footer')


</div>







</div>

<!---//End-content---->
<!----wookmark-scripts---->
<script src="{{ asset('/js/jquery.imagesloaded.js') }}"></script>
<script src="{{ asset('/js/jquery.wookmark.js') }}"></script>

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
         
<!----//wookmark-scripts---->
<!----start-footer--->
<!----//End-footer--->
<!---//End-wrap---->
</body>
</html>