          @if(count($posts) > 0)
          @foreach($posts as $value)
          @if($value->type=='0')
                  <?php $img = "<i class='fas fa-image'></i>"; ?>
                @else
                  <?php $img = "<i class='fas fa-video'></i>"; ?>
                @endif

          <div class="title-feed text-capitalize pl-1 font-weight-bold">
            <div class="clearfix">    
            <a href="/{{$value->channel_name}}">          
              @if(\App\Http\Controllers\PostController::channelImage($value->id)) 
            <img src="/images/profile-images/{{\App\Http\Controllers\PostController::channelImage($value->id)}}" data-src="/images/profile-images/{{\App\Http\Controllers\PostController::channelImage($value->id)}}"          
            class="float-left mr-2 rounded-circle" width="32" height="32" > {{$value->channel_name}}</div>
            @else
            <img src="/images/tibia_icon.png" class="float-left mr-2 rounded-circle" width="32" height="32" > {{$value->channel_name}}</div>
            @endif
            </a>

     
              
            
          </div>

          <!-- Blog Post -->
          <div class="card mb-4 border-0" style="font-family:roboto;">
            @if($value->type =='0')
            {{-- <img data-src="/images/uploads/{{$value->link}}" alt="{{$value->title}}" class="lazy img-responsive rounded border tibiavines-images-load" style="max-width: 100%; height: auto;"> --}}
            <img class="lazy img-responsive" style="max-width: 100%; height: auto;" data-src="/images/uploads/{{$value->link}}" src="/images/default.jpg" />
            @else
              <?php $q = explode('=', $value->link ); ?>
            <div class="embed-responsive embed-responsive-16by9">
          <iframe src="https://www.youtube.com/embed/{{$q[1]}}?rel=0&amp;showinfo=0&amp;autoplay=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="lazy embed-responsive-item rounded border"></iframe>
        </div>
            @endif
            <div class="card-body" style="padding-top:0;">
              

              
              <div class="clearfix"></div>
              <span class="font-weight-bold"><span id="num_likes">{{$value->likes}}</span> likes</span>

              <h2 class="card-title"><?= $img ?> {{$value->title}}</h2>
              <p class="card-text">{{$value->description}}</p>
              <p class="card-text text-muted">{!!app(App\Http\Controllers\commentController::class)->countComment($value->id)!!} comments</p>
              <a href="/{{$value->channel_name}}/{{$value->id}}" class="btn btn-info">Go to Post</a>
            </div>
            <div class="card-footer text-muted">
              Posted {{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}
            </div>
          </div>
  <script>
  </script>
          <hr>
          @endforeach         
          
          @endif
          


        
