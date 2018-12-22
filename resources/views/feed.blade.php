@extends('layouts.feed_master')
@section('feed_menu', 'active')
@section('feed')
{{-- MODAL LIKES    --}}


          <!-- Blog Entries Column -->
<div class="col-md-8 rounded py-3 text-left bg-light border ml-2 mb-2 text-center">

    <a href="/user/upload-photo" target="_blank" >
    <button type="button" class="btn btn-light col-md-3">
    <div class="photo"></div>
    <div class="clearfix"></div>
    <small>Upload</small>
    <small>Photo</small>    
    </button>
    </a>

    <a href="/user/upload-vine" target="_blank">
    <button type="button" class="btn btn-light col-md-3">
    <div class="video"></div>
    <div class="clearfix"></div>
    <small>Upload Video</small>    
    </button>
    </a>


    <a href="/{{auth::user()->channel_name}}" target="_blank">
    <button type="button" class="btn btn-light col-md-3">
    <div class="channel"></div>
    <div class="clearfix"></div>
    <small>My channel</small>    
    </button>
    </a>
    

  
  
</div>
        <div class="col-md-8 rounded py-3 text-left bg-white border ml-2" id="post-data">          
          @include('data')
          <div class="ajax-load text-center" style="display:none">
  <p><img src="https://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
</div>
        </div>
        
        <script>
          var imgs = $(".tibiavines-images-load");
    $.each(imgs, function () {
        var $this = $(this);
        var im = new Image();
        im.onload = function () {
            var theImage = $this;
            $this.hide("slow");
            theImage[0].src = im.src;
            $this.show('fast');
        };
        im.src = $this.data("mainsrc");
    });

        </script>
  	@endsection  

    @section('widgets')
   

    @endsection

