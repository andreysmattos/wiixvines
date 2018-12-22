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
  <div class="card-header">Last Interactions</div>
  <div class="card-body" id="interaction-page">
    <div class="clearfix">
Loading...
</div>
    @foreach($data as $value)
    @if(isset($check))

      
    @else
    

      
      <p>Basically, you don't have anything new!</p>
    
    <hr>
    @endif
    @endforeach


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