@foreach($data as $value)

<div class="col-lg-3 col-md-5" style="padding:0 5px 0 0;">
              <div class="card rounded border-0 bg-transparent">
                @if($value->type=='0')
                  <?php $img = "<i class='fas fa-image'></i>"; ?>
                @else
                  <?php $img = "<i class='fas fa-video'></i>"; ?>
                @endif
                  @if($value->type == '0')
                  <a href="{{$value->channel_name}}/{{$value->id}}">
                <img class="card-img-top img-responsive"  src="/images/uploads/{{$value->link}}" alt="" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>
                  @else
                <?php $q = explode('=', $value->link);?>
                <a href="{{$value->channel_name}}/{{$value->id}}"><img class="card-img-top img-responsive" src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" style="max-width: 100%;height: auto;width:210px;height:118px;"></a>
              
                @endif

                <div class="card-body">
                  <span class="card-title font-weight-bold">
                    <a href="{{$value->channel_name}}/{{$value->id}}"><?= $img ?> {{$value->title}}</a>
                  </span>
                  <div class="clearfix"></div>                
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> {{$value->server}}</small>
                  <div class="clearfix"></div>
                  <a href="/{{$value->channel_name}}" class="hover-href"><small class=""><i class="fas fa-book"></i> {{$value->channel_name}}</small></a>
                  <div class="clearfix">
                  <small class="text-muted"><i class="far fa-eye"></i> {{$value->view}}</small>
                  <div class="clearfix"></div>
                  <small class="text-muted">  {{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</small>
                  </div>

                                    
                 </div>

              </div>
            </div>
 

  
  @endforeach