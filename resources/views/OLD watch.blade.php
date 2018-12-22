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
@if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif

             @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
            @endif 
@foreach($vines as $value)
<input type="hidden" id="post_id" class="post_id" value="{{$value->id}}">
<article class="single-blog" id="{{$value->id}}" style="background-color:#fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);box-sizing: border-box;">
          <a id="img-like">
          <div class="post-thumb">

              @if($value->type == '0')
        <a href="#" class="pop">
        <img class="lazy-fade tibiavines-watch img-responsive" src="/images/default.jpg" data-src="/images/uploads/{{$value->link}}" id="pop" alt="Opa" style="max-width: 100%; height: auto;">
        </a>
                @else

  <?php 
  $q = explode('=', $value->link )?>

        <div class="embed-responsive embed-responsive-16by9">
          <iframe src="https://www.youtube.com/embed/{{$q[1]}}?rel=0&amp;showinfo=0&amp;autoplay=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="lazy-fade tibiavines-watch embed-responsive-item"></iframe>
        </div>
        
        @endif
          </div>
          <small>
          <button type="button" class="border-0 bg-transparent" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Report</button>
          </small>
          <div class="post-content">          
            <div class="entry-header text-center text-uppercase">
              
              
              <a class="post-cat">{{$value->server}}</a>
              <h2>@if(auth::check() && auth::user()->channel_name != null)

      <div class="btn border-0 bg-transparent like-button" id="like-button" style="margin:0 0 0 0;padding:0 0 0 0;display:none;"><div class="like"></div></div>

      <div class="btn border-0 bg-transparent unlike-button" id="unlike-button" style="margin:0 0 0 0;padding:0 0 0 0;display:none;"><div class="liked"></div></div>

      @endif
      {{$value->title}}
    </h2>
            </div>
            <div class="entry-content text-center">
              <p style="overflow: hidden;
  display: -webkit-box;+
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;line-height: 120%;">{{$value->description}}</p>
            </div>

              <div class="text-white pl-2 font-weight-bold" style="background-color:#da521e;"><p>Comments</p></div>
        <div class="card-body scroll-box" id="comments-show" style="min-height: 100px;">
          @foreach($comments as $comentario)

          <div class="clearfix">
            
            {{-- DELETAR COMENTÁRIOS  --}}

            @if(auth::check() && $comentario->user_id == auth::user()->id)
            <form action="{{route('commentDelete')}}" method="POST">
              {{csrf_field()}}              
                <input type="hidden" id="comment_id" value="{{$comentario->id}}" name="id">
                <input type="hidden" id="cmpage_id" value="{{$value->id}}" name="id_page">
                <button type="submit" class="float-right text-muted border-0 text-muted bg-transparent btn"> <i class="fas fa-times"></i></button>
            </form>
            
            @endif
          
            {{-- MOSTRAR COMENTARIOS --}}

            <a href="/{{$comentario->channel_name}}">
            @if($comentario->image)
            <img src="/images/profile-images/{{$comentario->image}}" class="float-left mr-2 rounded-circle" width="32" height="32" >
            @else
            <img src="/images/profile-images/default.png" class="float-left mr-2 rounded-circle" width="32" height="32" >
            @endif
           <span class="font-weight-bold">{{$comentario->channel_name}}</span>
            </a>
            <div class="clearfix"></div>
                  <span class="card-text">{{$comentario->comment}}</span><br>
          <small class="text-muted">{{ \Carbon\Carbon::parse($comentario->created_at)->diffForHumans() }}</small>
          <hr>
          </div>
          @endforeach

        </div>


          {{-- INSERIR COMENTARIO --}}
        <meta name="_token" content="{{ csrf_token() }}" /> 
        <div class="card-footer bg-transparent">
          @if (Auth::check() && auth::user()->channel_name != null)

          <form action="{{route('insertComment')}}" method="POST" id="addcomment">
            {{csrf_field()}}
            <input type="hidden" id="page_id" name="page_id" value="{{$value->id}}">
            
            <div class="container" id="commentxt">
              <textarea name="comment" id="myText" class="txtcoment" cols="30" rows="10"></textarea>
            </div>
            <button type="button" id="insert_comment" class="text-white btn btn-default float-right mt-1 mr-3 rounded" style="background-color:#da521e;">Send</button>        
              <span class="text-danger ml-2" id="erromsg"></span>
          </form>
          
          @else
          You need login or create channel to comment.
          @endif

          {{-- FIM COMENTARIOS --}}


            <div class="post-meta">
              <ul class="pull-left list-inline author-meta">
                <li class="author">By <a href="#">{{$value->channel_name}} </a></li>
                <li class="date"> On {{Carbon\Carbon::parse($value->created_at)->format('d M,y, H:i')}}</li>
              </ul>
              <ul class="pull-right list-inline social-share">
                <li class="list-inline-item">
                  <button type="button" style="margin:0 0 0 0;padding:0 0 0 0;" class="border-0 bg-transparent text-muted" data-toggle="modal" data-target="#likesModal">
                  <i class="fas fa-heart"></i> <span class="num_likes">{{$value->likes}}</span>
                  </button>
                </li>                
                <li class="list-inline-item"><a href=""><i class="fas fa-comment"></i> {{$value->comments}}</a></li>
                <li class="list-inline-item"><a href=""><i class="far fa-eye"></i> {{$value->view}}</a></li>
              </ul>
            </div>
          </div>
        </article>


        {{-- MODELS - REPORT --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report photo or user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('addReport')}}">
          {{csrf_field()}}
          <input type="hidden" name="page_id" value="{{$value->id}}">
          <input type="hidden" name="page_title" value="{{$value->title}}">
          <input type="hidden" name="channel_name" value="{{$value->channel_name}}">       
          <div class="form-group">
            <label for="title" class="col-form-label">Reason:</label>
            <select name="title" class="form-control" id="title">
              <option disabled selected>Select reason</option>

              <option value="nudity">Contains nudity</option>
              <option value="offensive">Offensive</option>
              <option value="personal image">Personal image</option>
              <option value="non-original content">Non-original content</option>
              <option value="identity theft">Identity theft</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text"></textarea>
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Send Report</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- MODELS LIKES --}}
{{-- MODAL LIKES --}}
       <div class="modal fade bd-example-modal-sm" id="likesModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered rounded" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Likes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 500px;overflow: auto;">

          @foreach($likes as $curti)
          <div class="liked float-left mr-2"></div><h3 class="font-weight-bold"><a href="/{{$curti->channel_name}}">{{$curti->channel_name}}</a></h3>
          @endforeach

      </div>
      
    </div>
  </div>
</div>
{{-- FIM MODAL LIKS --}}



@endforeach
  @endsection
  @section("popular_posts")
  @foreach($popular as $most)
  <li class="list-inline-item">
                <a href="/{{$most->channel_name}}/{{$most->id}}" class="popular-img">
                  
           @if($most->type=='0')
        
          <img src="/images/default.jpg" data-src="/images/uploads/{{$most->link}}" alt="{{$most->title}}" class="lazy img-responsive">
          
        

          @else
          <?php $q = explode('=', $most->link);?>
          <img class="lazy img-responsive" data-src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" alt="">

          @endif
                 
                </a>
                <div class="p-content">
                  <h4><a href="#{{$most->id}}" class="text-uppercase">{{$most->title}}</a></h4>
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
          <img class="lazy img-responsive" data-src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" alt="">

          @endif

                 


                  </a>
                </div>
                <div class="latest-post-content">
                  <h2 class="text-uppercase"><a href="#">{{$ultimo->title}}</a></h2>
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
        
          <img src="/images/default.jpg" data-src="/images/uploads/{{$outros->link}}" alt="{{$outros->title}}" class="lazy img-responsive">
          
        

          @else
          <?php $q = explode('=', $outros->link);?>
          <img class="lazy img-responsive" data-src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" src="/images/default.png" alt="">

          @endif
                </a>
                <div class="insta-overlay">
                  <div class="insta-meta">
                    <ul class="list-inline text-center">
                      <li class="list-inline-item"><a href=""><i class="fa fa-heart-o"></i></a> {{$outros->likes}}</li>
                      <li class="list-inline-item"><a href=""><i class="fa fa-comment-o"></i></a> {{$outros->comments}}</li>
                    </ul>
                  </div>
                </div>
                <a href="" class="insta-link"></a>
              </div>
  @endforeach
  @endsection