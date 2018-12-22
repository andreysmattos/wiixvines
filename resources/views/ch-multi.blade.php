@if(count($data) > 0)
                  <div class="row">

            @foreach($data as $content)
            @if($content->type=='0')
                  <?php $img = "<i class='fas fa-image'></i>"; ?>
                @else
                  <?php $img = "<i class='fas fa-video'></i>"; ?>
                @endif

            <div class="col-md-3" style="padding:0 5px 0 0;">    
            <a href="/{{$content->channel_name}}/{{$content->id}}">                   
              <div class="card mb-2 border-0 shadow-sm channelfeed">

                @if($content->type == '0')
                <img class="lazy card-img-top image" src="/images/default.jpg" data-src="/images/uploads/{{$content->link}}" alt="{{$content->title}}" style="width:250px;height:180px;">
                @else
                <?php $q = explode('=', $content->link);?>
                <img class="lazy card-img-top" src="/images/default.jpg" data-src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" alt="{{$content->title}}" style="width:250px;height:180px;">
                @endif
                <div class="middle">
                  <div class="text text-left bg-light">             
                  <div class="clearfix"></div>             
                  <small><i class="fas fa-globe-americas"></i> {{$content->server}}</small>
                  <div class="clearfix"></div>                  
                  <div class="clearfix">
                  <small><i class="far fa-eye"></i> {{$content->view}}</small>
                  <div class="clearfix"></div>
                  <small class="text-muted">  {{Carbon\Carbon::parse($content->created_at)->diffForHumans()}}</small>
                  </div></div>
                  
                </div>
                <span class="font-weight-bold ml-2 text-muted" style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;line-height: 120%;">{{$content->title}}</span>
              </div>
              </a>
            </div>


              @endforeach
          </div>
            @else
            <h1 class="text-center font-weight-bold">Aff, this channel is empty... 🙁</h1>
            @endif