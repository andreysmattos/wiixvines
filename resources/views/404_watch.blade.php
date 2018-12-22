@extends('layouts.master_channel')

@section('col-padrao', 'col-lg-12')
@section('bg_color', '')
@section('ch_color', 'bg-white rounded border')
<?php 
$bg_header = "bg-dark";
$ch_name_color = "text-light";
$ch_desc_color = "text-light";

$title_color = "";
$subtitle_color = "text-muted";

$text_color = "text-light";
$hr_color ="bg-light";

?>


@section('feed_vines')
@endsection

@section('loop_vines')
<section class="bg-white col-md-12 mb-3"  align="center" style="height:256px;">
    <img src="/images/default.jpg" data-src="/images/profile-images/404_channel.jpg" class="rounded-circle lazy ml-2 img-responsive" width="128px" height="128px" alt="">


    
    <h1 class="display-4 font-weight-bold" style="margin:0 0 0 0;">Ops!</h1>
    <p class="lead text-muted">Uh, this channel does not exist... I know it's sad 😢</p>
    <a href="/">
    <button type="button" class="font-weight-bold btn btn-info">To Back, click here!</button>
   </a>

</div>
</section>
<hr>
</section>     
      <div class="album col-md-12">
        <div class="container" id="vines_meio">
          <div class="multi" style="display:none;">
          </div>
          <div class="feed" style="display:none;">

          </div>

          
            
          </div>
          </div>
      </div>
	@endsection
	@section('footer')
 <footer class="page-footer rounded-top font-small">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="/"> TibiaVines.com</a>
  </div>
  <!-- Copyright -->

</footer>
<script>
  $(document).ready(function(){
  $('.multi').show();
  $('.mitem').addClass("active");


    $('.mitem').click(function () {
      $('.feed').hide();      
      $('.multi').show();
      $('.fitem').removeClass("active");

      $('.mitem').addClass("active");


});

        $('.fitem').click(function () {
        $('.multi').hide();
        $('.feed').show();
      $('.mitem').removeClass("active");
      $('.fitem').addClass("active");



});

    
  })
</script>
	@endsection