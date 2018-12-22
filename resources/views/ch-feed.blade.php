@if(count($data) > 0)
<div class="col-md-12" align="center">
          <div class="card mb-4 col-md-8 border-0 text-left">
        @foreach($data as $value)
          @if($value->type=='0')
                  <?php $img = "<i class='fas fa-image'></i>"; ?>
                @else
                  <?php $img = "<i class='fas fa-video'></i>"; ?>
                @endif

          <!-- Blog Post -->
          
            @if($value->type =='0')

            <img class="lazy img-responsive" style="max-width: 100%; height: auto;" data-src="/images/uploads/{{$value->link}}" src="/images/default.jpg" />

            @else

              <?php $q = explode('=', $value->link ); ?>
            <div class="embed-responsive embed-responsive-16by9">
          <iframe src="https://www.youtube.com/embed/{{$q[1]}}?rel=0&amp;showinfo=0&amp;autoplay=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="lazy embed-responsive-item rounded border"></iframe>
        </div>
            @endif



            <div class="card-body">
              <h2 class="card-title"><?= $img ?> {{$value->title}}</h2>
              <p class="card-text">{{$value->description}}</p>
              <p class="card-text text-muted">{!!app(App\Http\Controllers\commentController::class)->countComment($value->id)!!} comments</p>
              <a href="/{{$value->channel_name}}/{{$value->id}}" class="btn btn-info">Go to Post</a>
            </div>
            <div class="card-footer text-muted">
              Posted {{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}
            </div>

          <hr>
      @endforeach
          </div>
          @endif

          