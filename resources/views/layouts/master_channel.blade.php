<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
	<head>
		<title>Tibia Vines - @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="../images/fav-icon.png" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous"></script>
		<!----//webfonts---->
    <meta name="_token" content="{{ csrf_token() }}" />

		<!-- Global CSS for the page and tiles -->
		<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
		<link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/styles-auth.css') }}" rel="stylesheet">

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

  {{-- EMOJIS FIM --}}
		<!-- scripts -->
    
<style>
.image {
  opacity: 1;
  background-color:#000;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.channelfeed:hover .image {
  opacity: 0.3;
}

.channelfeed:hover .middle {
  opacity: 1;
}

.text {
  padding: 5px 5px 5px 5px;

  font-size: 16px;

}

.multi-itens{
background-size: auto; 
background-repeat: no-repeat;
background-position: -190px -438px;
display: inline-block;
height: 12px;
width: 12px;
}
.feeditem{
  background-size: auto; 
background-repeat: no-repeat;
background-position: -378px -128px;
display: inline-block;
width: 13px;
  height: 17px;
}

.multi-itens, .feeditem{
background-image: url(/images/f37e41a0eb73.png);
}


  .like{
        background:url(/images/f37e41a0eb73.png) no-repeat -106px -359px;
  width: 22px;
  height: 20px;
  }

  .liked { 
    background:url(/images/f37e41a0eb73.png) no-repeat  -51px -459px;
  width: 22px;
  height: 20px;
   }
   .unfollow-icon{
    background:url(/images/f37e41a0eb73.png) no-repeat -387px -360px;
  width: 14px;
  height: 14px;
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
		<script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
</script>
  <!-- jsDeliver -->
<script src="{{ asset('/jquery.lazy-master/jquery.lazy.js')}}"></script>
<script>
  $(function(){
  $("img.lazy").lazy();
  $("img.lazy-fade").lazy({ 
  effect: "fadeIn",
          effectTime: 2000,
          threshold: 0
          });
  });

</script>

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


<script>
  function loading(){
     $('#load').css('display','none');
     $('#tudo_page').css('opacity','1');
   }
</script>
 <script type="text/javascript">
$(document).ready(function(){
var pageid = $('#actualpage_id').val();                      
        $.ajax({
            url: '{{ route('checkLike') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
              if(data == 'true')
              {
                $('#unlike-button').show();
              }
              else
              {
                $('#like-button').show();
              }        
             }
        })

      $('#like-button').click(function(){
          var pageid = $('#actualpage_id').val();   

        $.ajax({
            url: '{{ route('like') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {                      
                  $('#like-button').hide();
                  $('#unlike-button').show();
            }            
          })

        });

        $('#unlike-button').click(function(){

          var pageid = $('#actualpage_id').val();                      
        $.ajax({
            url: '{{ route('unlike') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
                $('#unlike-button').hide();  
                $('#like-button').show();
                   
                                
            }            
        })
      
      });

         }) 
           
 </script>

<script type="text/javascript">
$(document).ready(function(){
var pageid = $('#actualpage_id').val();                      
        $.ajax({
            url: '{{ route('checkFollow') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
                if(data){
                  $('#unfollow-button').show();
                }else{
                  $('#follow-button').show();
                }         
                                
            }
             })
        })
</script>
<script type="text/javascript">
        $('#follow-button').click(function(){
        var pageid = $('#actualpage_id').val();                               
        $.ajax({
            url: '{{ route('joinFollow') }}',
            type: 'get',
            data: {
                "searchid": pageid
            }, 
             success: function (data) {
                if(data){
                  $('#follow-button').hide();                  
                  $('#unfollow-button').show();
                }else{
                  $('#unfollow-button').hide();
                  $('#follow-button').show();
                }         
                                
            },
            error: function(data){
              alert(data);
            }

             })

        })

         $('#unfollow-button').click(function(){
        var pageid = $('#actualpage_id').val();                               
        $.ajax({
            url: '{{ route('delFollow') }}',
            type: 'get',
            data: {
                "searchid": pageid
            }, 
             success: function (data) {
                if(data){
                  $('#unfollow-button').hide();                  
                  $('#follow-button').show();
                }else{
                  $('#follow-button').hide();
                  $('#unfollow-button').show();
                }         
                                
            },
            error: function(data){
              alert(data);
            }

             })

        })   
 </script>

 

<script type="text/javascript">
 
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
</script>


<style>
/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; 
}
</style>
	</head>
	<body style="background-color:#938979;
    background-image: url('/images/bg3.jpg');
    background-repeat: no-repeat;
    background-position: center top;
    background-attachment: fixed;" onload="loading()">
    <div id="load"></div>
<div id="tudo_page">
    <div class="page-wrapper @yield('bg_color')">
  @include('layouts.navbar')

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

        <h5 class="modal-title" id="exampleModalLabel">OPS!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    	{{session()->get('back_msg')}}
    </div>
  </div>
</div>
{{session()->forget('back_msg')}}
@endif

<!-- fim model  -->

		

<!-- FIM MODEL UPLOAD -->




		<div id="main-channel" role="main">

 <div class="@yield('ch_color') container">

      <div class="row">

       <div class="@yield('col-padrao')">

          
				<h3><b>@yield('findmode')</b></h3>
          <div class="row" id="loopvines">
			@yield('loop_vines')
            
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
        <div class="col-lg-3" >
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

<script type="text/javascript">
    $(document).ready(function() {
      $("#myText").emojioneArea({

      });
    });
  </script>
<!----//wookmark-scripts---->
<!----start-footer--->
<!----//End-footer--->
<!---//End-wrap---->

</body>
</html>