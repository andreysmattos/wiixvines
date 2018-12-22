          @forelse($data as $product)
          <div class="clearfix">      <img src="/images/user_lv1.png" class="float-left mr-2 rounded-circle" width="32" height="32" >
      <form action="{{route('commentDelete')}}" method="POST">
        {{csrf_field()}}
      <a href="" class="text-muted float-right">
      <input type="hidden" value="{{$product->id}}" name="id">
      <input type="hidden" value="{{$product->page_id}}" name="id_page">
      <button type="submit" class="border-0 text-muted bg-white btn"><i class="fas fa-times"></i></button>      
      </a>
      </form>
      <div class="content-heading"><h5><a href="/account/user/{{$product->channel_name}}" target="_blank">{{$product->channel_name}} </a><small class="text-muted">{{Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</small></h5></div>
      
    </div>
    <span class="card-text">{{$product->comment}}</span><br>
    <small class="text-muted">in <a href="/{{$product->to_channel_name}}/{{$product->page_id}}" target="_blank">{{$product->page_title}}</a></small>
    
    <hr>

          @empty
          <!-- Blog Post -->
          <div class="card mb-4 border-0">           
            <div class="card-body">
              <h2 class="card-title">You no have nothing new yet :(</h2>
              <p class="card-text"></p>
              <p class="card-text text-muted"></p>
            </div>
          </div>
          @endforelse