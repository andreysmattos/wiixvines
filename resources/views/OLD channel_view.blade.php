@extends('layouts.newmaster_channel')
@section('title'){{$channel}}@endsection
@section("channel_name")<a href="/{{$channel}}">{{$channel}}</a>@endsection
@section("channel_desc"){{$desc}}@endsection
@section('profile_bg')
<aside class="widget about-me-widget  text-center" style="background:url(/images/uploads/{{$default_item}}) no-repeat; -webkit-background-size: 100%;
    background-size: 100% 180px;
    background-color:#fff;">
@endsection
@section('page-wrapper')
<div class="page-wrapper container" style="
    background-color: {{$bg_color}};
    padding-top: 13px;
    padding-right: 18px;
    padding-bottom: 13px;
    padding-left: 28px;">
  @endsection
  @section('channel_profile')
  <img src="/images/profile-images/{{$profileimage}}" width="169" height="169" alt="" class="img-me img-circle">
  @endsection


@section('loop_article')
<div class="py-3 border mb-2 text-center" style="background-color:#fff;">

    <button type="button" class="button-mitem btn btn-light col-md-3">
    <div class="multi-itens"></div>
    </button>  

    <button type="button" class="button-fitem btn btn-light col-md-3">
    <div class="feeditem"></div>
    </button>


</div>


<div id="feed" style="display:none;" >
   @if(count($data) > 0)
@foreach($data as $value)

<article class="single-blog" id="{{$value->id}}" style="background-color:#f6f7f2;box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);box-sizing: border-box;">
 

          <div class="post-thumb">
            <a href="/{{$value->channel_name}}/{{$value->id}}">
              @if($value->type == '0')
        
        <img class="lazy-fade tibiavines-watch img-responsive" src="/images/default.jpg" data-src="/images/uploads/{{$value->link}}" alt="Opa" style="max-width: 100%; height: auto;">
                @else

  <?php 
  $q = explode('=', $value->link )?>

        <div class="embed-responsive embed-responsive-16by9">
          <iframe src="https://www.youtube.com/embed/{{$q[1]}}?rel=0&amp;showinfo=0&amp;autoplay=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="lazy-fade tibiavines-watch embed-responsive-item"></iframe>
        </div>
        
        @endif

            </a>


            

          </div>
          <div class="post-content">          
            <div class="entry-header text-center text-uppercase">
              
              <a href="#" class="post-cat">{{$value->server}}</a>
              <h2><a href="/{{$channel}}/{{$value->id}}">{{$value->title}}</a></h2>
            </div>
            <div class="entry-content text-center">
              <p style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;line-height: 120%;">{{$value->description}}</p>
            </div>
            <div class="continue-reading text-center text-uppercase">
              <a href="/{{$channel}}/{{$value->id}}">SEE POST</a>
            </div>
            <div class="post-meta">
              <ul class="pull-left list-inline author-meta">
                <li class="author">By <a href="#">{{$value->channel_name}} </a></li>
                <li class="date"> On {{Carbon\Carbon::parse($value->created_at)->format('d M,y, H:i')}}</li>
              </ul>
              <ul class="pull-right list-inline social-share">
                <li class="list-inline-item"><a href=""><i class="fas fa-heart"></i> {{$value->likes}}</a></li>                
                <li class="list-inline-item"><a href=""><i class="fas fa-comment"></i> {{$value->comments}}</a></li>
                <li class="list-inline-item"><a href=""><i class="far fa-eye"></i> {{$value->view}}</a></li>
              </ul>
            </div>
          </div>
        </article>
@endforeach
@else
<div style="background-color:#fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);box-sizing: border-box;">
<h1 class="py-5 text-center font-weight-bold">Aff, this channel is empty... 🙁</h1>
</div>
@endif
<div class="post-pagination  clearfix">
          {{ $data->render("pagination::bootstrap-4") }}
</div>
</div>


<div id="multi" style="background-color:#fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);box-sizing: border-box;">
              @if(count($data) > 0)
              <div class="row" style="padding-left:15px;padding-right:15px" >
            @foreach($data as $content)
            @if($content->type=='0')
                  <?php $img = "<i class='fas fa-image'></i>"; ?>
                @else
                  <?php $img = "<i class='fas fa-video'></i>"; ?>
                @endif

            <div class="col-md-3" style="padding:0 0 0 0;" align="center">
              
            <div class="item" style="margin:1px 2px 3px 4px;">
            <a href="/{{$content->channel_name}}/{{$content->id}}">                   
              <div class="card mb-2 border-0 shadow-sm channelfeed bg-transparent">

                @if($content->type == '0')
                <img class="lazy card-img-top image img-responsive" src="/images/default.jpg" data-src="/images/uploads/{{$content->link}}" alt="{{$content->title}}" style="width:100%;height: 180px;">
                @else
                <?php $q = explode('=', $content->link);?>
                <img class="lazy card-img-top img-responsive" src="/images/default.jpg" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" alt="{{$content->title}}" style="width:250px;height:180px;">
                @endif
                <div class="middle">
                  <div class="text text-left bg-light">             
                  <div class="clearfix"></div>             
                  <small><i class="fas fa-globe-americas"></i> {{$content->server}}</small>
                  <div class="clearfix"></div>                  
                  <div class="clearfix">
                  <small><i class="fas fa-heart"></i> {{$content->likes}}</small>
                  <div class="clearfix"></div>
                  <small class="text-muted">  {{Carbon\Carbon::parse($content->created_at)->diffForHumans()}}</small>
                  </div></div>
                  
                </div>
                <span class="font-weight-bold ml-2 mt-1 text-left text-muted" style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;line-height: 120%;"><?=$img ?> {{$content->title}}</span>
              </div>
              </a>
            </div>
            </div>
            

              @endforeach
              </div>
          
            @else
            <h1 class="py-5 text-center font-weight-bold">Aff, this channel is empty... 🙁</h1>
            @endif
</div>

@endsection

  @section("popular_posts")
  @foreach($popular as $most)
  <li class="list-inline-item">
                <a href="/{{$most->channel_name}}/{{$most->id}}" class="popular-img">
                  
           @if($most->type=='0')
        
          <img src="/images/default.jpg" data-src="/images/uploads/{{$most->link}}" alt="{{$most->title}}" class="lazy img-responsive">
          
        

          @else
          <?php $q = explode('=', $most->link);?>
          <img class="lazy img-responsive" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" alt="">

          @endif
                 
                </a>
                <div class="p-content">
                  <h4><a href="/{{$most->channel_name}}/{{$most->id}}" class="text-uppercase" style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;line-height: 120%;">{{$most->title}}</a></h4>
                  <span class="p-date">{{$most->server}} </span>
                </div>
              </li>
  @endforeach


  @endsection

  @section('latest_posts')
  @foreach($latest as $ultimo)
                <li class="media">
                <div class="media-left">
                  <a href="/{{$ultimo->channel_name}}/{{$ultimo->id}}" class="popular-img">
                  
                  @if($ultimo->type=='0')
        
          <img src="/images/default.jpg" data-src="/images/uploads/{{$ultimo->link}}" alt="{{$ultimo->title}}" class="lazy img-responsive">
          
        

          @else
          <?php $q = explode('=', $ultimo->link);?>
          <img class="lazy img-responsive" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" alt="">

          @endif

                 


                  </a>
                </div>
                <div class="latest-post-content">
                  <h2 class="text-uppercase" style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;line-height: 120%;"><a href="/{{$ultimo->channel_name}}/{{$ultimo->id}}">{{$ultimo->title}}</a></h2>
                  <p>{{$ultimo->server}}</p>
                </div>
              </li>
@endforeach

  @endsection

  @section("others_posts")
  @foreach($others as $outros)
<div class="single-instagram">
                <a href="{{$outros->channel_name}}/{{$outros->id}}">
                  @if($outros->type=='0')
        
          <img src="/images/default.jpg" data-src="/images/uploads/{{$outros->link}}" alt="{{$outros->title}}" class="lazy img-responsive" style="width: 100%;height: 100%;">
          
        

          @else
          <?php $q = explode('=', $outros->link);?>
          <img class="lazy img-responsive" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" style="width: 100%;height: 100%;">

          @endif
                </a>
                <a href="{{$outros->channel_name}}/{{$outros->id}}">
                <div class="insta-overlay">
                  <div class="insta-meta">
                    <ul class="list-inline text-center">
                      <li class="list-inline-item">{{$outros->title}}</li>
                      <div class="clearfix"></div>
                      <li class="list-inline-item"><i class="fa fa-heart-o"></i> {{$outros->likes}}</li>
                      <li class="list-inline-item"><i class="fa fa-comment-o"></i> {{$outros->comments}}</li>
                    </ul>
                  </div>
                </div>
              </a>
                <a href="{{$outros->channel_name}}/{{$outros->id}}" class="insta-link"></a>
              </div>
  @endforeach
  @endsection