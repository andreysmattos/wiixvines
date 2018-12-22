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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Upload Vine 
                            </div>
                              @if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif
                                
                                
                                        @if(session()->has('msgkeycode'))
                                        <div class="alert alert-danger rounded">
                                            {{session()->get('msgkeycode')}}<br />
                                        </div>
                                         {{session()->forget('msgkeycode')}}
                                        @endif

                            <div class="card-body">
      
                                <div class="row">

                                    <div class="col-md-12">
                            @foreach($data as $value)
                           
                             <form action="{!! route('vinesupdate', $value->id) !!}" method="post">
                                        {{ csrf_field() }}
                                            @if($value->type == '0')
                                            <img class="rounded border" src="/images/uploads/{{$value->link}}" alt="" style='max-width:100%;max-height: 500px; '>
                                            @else
                                            <?php $q = explode('=', $value->link);?>
                                        <img class="rounded border" src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" style='max-width: 100%;max-height: 500px;'alt="">
                                        @endif


                                        <div class="form-group mt-3">
                                            <label for="title" class="form-control-label">Title</label>
                                            <input id="title" name="title" value="{{$value->title}}" class="form-control" autocomplet='off' required>
                                            <div id="titleerro" class="text-danger pl-3 font-weight-light"></div>
                                        </div>
                                    </div>
                                   </div>      
                                 

<div class="form-group" id="radioplaymode">
            <h4><b>
              Play Mode</b>
            </h4>
            <?php 
            $pvp = '';
        $pvm = '';
        $quests = '';
            switch($value->playmode){
              case 'PvP':
              $pvp = 'checked';
              break;
              case 'PvM':
              $pvm = 'checked';
              break;
              case 'Quests':
              $quests = 'checked';
              break;
              default:

        break;

            }
            ?>
            <div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="PvP" class="custom-control-input" id="Player vs Player" {{$pvp}}>
  <label class="custom-control-label" for="Player vs Player">Player vs Player</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="PvM" class="custom-control-input" id="Player vs MoB" {{$pvm}}>
  <label class="custom-control-label" for="Player vs MoB">Player vs MoB</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="Quests" class="custom-control-input" id="Quests" {{$quests}}>
  <label class="custom-control-label" for="Quests">Quests</label>
</div>

            </div>
</div>

                            
                   
                  <div class="col-md-12">  
                  <div class="form-group">
                                 <div class="input-group">

    <label for="desc">Description:</label>
  </div> <textarea class="form-control" aria-label="With textarea" id="desc" name="description" maxlength="200" rows="5">{{$value->description}}</textarea>
  

<div id="descerro" class="text-danger pl-3 font-weight-light"></div>
</div>


                              <button type="submit" class="form-control rounded cursor_pointer btn btn-info btn-outline-info border border-info font-weight-bold">Update</button>
                             </form>
                             @endforeach
            </div>
        </div>
    </div>
</div>

@endsection