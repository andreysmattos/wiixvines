@extends('painel.layouts.painel')
@section('title', '')
@section("background", 'background-color:#f6f7f2;')
@section('content')
<div class="container page-wrapper chiller-theme toggled">
<div class="row" style="margin:0;">
 @include('painel.components.sidebar-panel-dev')
 {{-- @include('painel.components.model-sidebar-panel-dev') --}}
        
        <!-- sidebar-wrapper  -->
        <main class="page-content col-xl-8 col-md-12 col-sm-12">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10">

                  <div class="card mb-3 text-left" style="width: 100%;height:100%">
  <div class="card-header bg-light">Following</div>
  <div class="card-body">
 @forelse($subs as $sub)
    <a href="/{{$sub->name}}">
    <div class="clearfix">
     <img src="/images/user_lv1.png" class="float-left mr-2 rounded-circle" width="32" height="32" >
    <h5 class="card-title font-weight-bold ">{{$sub->name}} <small class="text-muted">since {{Carbon\Carbon::parse($sub->created_at)->format('d M Y')}}</small></h5>
      </div>
      </a>
      
        <form action="{{route('unsubscribe')}}" method='POST'>
        {{csrf_field()}}
          <input type="hidden" value="{{$sub->name}}" name="name">
          <button class="btn btn-secondary" type="submit"><i class="fas fa-user-times"></i> 
          unfollow</button>
        </form>

    <hr>
    @empty
We search some channels to you follow... <a href="/">check here!</a>
@endforelse

  </div>
  <div class="card-footer bg-transparent">
  </div>
</div>

      </div>


                </div>
</div>
</div>
</div>
</div>

@endsection