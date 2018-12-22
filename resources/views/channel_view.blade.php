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


<div id="multi" style="background-color:#fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);box-sizing: border-box;">
              @if(count($data) > 0)
              <div class="row" style="margin:0;" >
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
                
                <div class="imgtop">
                @if($content->type == '0')
                <img class="hover-anim lazy card-img-top image img-responsive" src="/images/default.jpg" data-src="/images/uploads/{{$content->link}}" alt="{{$content->title}}" style="width:auto;height: 180px;display:inline-block;">
                @else
                <?php $q = explode('=', $content->link);?>
                <img class="hover-anim lazy card-img-top img-responsive" src="/images/default.jpg" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" alt="{{$content->title}}" style="width:auto;height: 180px;display:inline-block;">
                @endif

                </div>
                <div class="middle">
                  <div class="text text-left ">    
                  <span class="font-weight-bold" style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;line-height: 120%;"><?=$img ?> {{$content->title}}</span>         
                  <div class="clearfix"></div>             
                  <small><i class="fas fa-globe-americas"></i> {{$content->server}}</small>
                  <div class="clearfix"></div>                  
                  <div class="clearfix">
                  <small><i class="fas fa-heart"></i> {{$content->likes}}</small>
                  <div class="clearfix"></div>
                  <small class="text-muted">  {{Carbon\Carbon::parse($content->created_at)->diffForHumans()}}</small>
                  </div></div>
                  
                </div>
                
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