@extends('layouts.master')

@section('main_content')

 <div class="container">
            <div class="first-att">
                
            </div>
            <div class="box-center">
                <div class="row">

                    
            <div class="sidebar col-xl-3 col-md-4 col-sm-12">
                <div class="search-box">
                    <div class="header">
                      <h5 style="">
                       @if (App::isLocale('pt-BR'))
    Buscar
@elseif(App::isLocale('es'))
    Buscar
@else
    Search
@endif
                      </h5>
                      <input type="text" class="form-control" id="searchAll" placeholder="@if (App::isLocale('pt-BR')) Título ou Nome do canal @elseif(App::isLocale('es')) Título o Nombre del canal  @else Tittle or Channel Name @endif">
                    </div>
                    <div class="body">
                        <div class="form-group">
                        <h5><b>
              @if (App::isLocale('pt-BR'))
    Mundos
@elseif(App::isLocale('es'))
    Mundos
@else
    Worlds
@endif
</b>
            </h5>
                          <select name="world" class="form-control" id="servers">
                              <option value="all">@if (App::isLocale('pt-BR'))
    Todos
@elseif(App::isLocale('es'))
    Todo
@else
    All
@endif
</option>
                                @foreach($worlds as $value)
                                <option value="{{$value->server}}">{{$value->server}}</option>
                                @endforeach 
                          </select>
                        </div>
<div class="form-group" id="pvptype">
            <h5>
              <b>
              
                @if (App::isLocale('pt-BR'))
                 Tipo do PvP
                @elseif(App::isLocale('es'))
                 Tipo del PvP
                @else
                 PvP Type 
                @endif

              </b>
            </h5>

     <div class="custom-control custom-checkbox">
  <input type="radio" class="custom-control-input" id="allpvp" name="pvptype" value="all" checked>
  <label class="custom-control-label" for="allpvp">@if (App::isLocale('pt-BR'))
                 Todos
                @elseif(App::isLocale('es'))
                 Todo
                @else
                 All
                @endif
              </label>
</div>

     <div class="custom-control custom-checkbox">
  <input type="radio" class="custom-control-input" name="pvptype" id="openpvp" value="Open PvP">
  <label class="custom-control-label" for="openpvp">Open PvP</label>
</div>

    <div class="custom-control custom-checkbox">
  <input type="radio" class="custom-control-input" name="pvptype" id="optinal" value="Optional PvP">
  <label class="custom-control-label" for="optinal">Optional PvP</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" class="custom-control-input" name="pvptype" id="retroopen" value="Retro Open PvP">
  <label class="custom-control-label" for="retroopen">Retro Open PvP</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" class="custom-control-input" name="pvptype" id="retrohardcore" value="Retro Hardcore PvP">
  <label class="custom-control-label" for="retrohardcore">Retro Hardcore PvP</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" class="custom-control-input" name="pvptype" id="hardcorepvp" value="Hardcore PvP">
  <label class="custom-control-label" for="hardcorepvp">Hardcore PvP</label>
</div>




            </div>
  <hr>
            <div class="form-group" id="radioplaymode">
            <h5><b>
              @if (App::isLocale('pt-BR'))
                 Modo de jogo
                @elseif(App::isLocale('es'))
                 Modo de juego
                @else
                 Play Mode
                @endif</b>
            </h5>
<div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="all" class="custom-control-input" id="allradio" value="all" checked>
  <label class="custom-control-label" for="allradio">@if (App::isLocale('pt-BR'))
                 Todos
                @elseif(App::isLocale('es'))
                 Todo
                @else
                 All
                @endif</label>
</div> 

            <div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="pvp" class="custom-control-input" id="Player vs Player">
  <label class="custom-control-label" for="Player vs Player">@if (App::isLocale('pt-BR'))
                 Jogador vs Jogador
                @elseif(App::isLocale('es'))
                 Jugador vs Jugador
                @else
                 Player vs Player
                @endif</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="pvm" class="custom-control-input" id="Player vs MoB">
  <label class="custom-control-label" for="Player vs MoB">@if (App::isLocale('pt-BR'))
                 Jogador vs Monstros
                @elseif(App::isLocale('es'))
                 Jugador vs Bijos
                @else
                 Player vs MoB
                @endif</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="radio" name="playmode" value="quests" class="custom-control-input" id="Quests">
  <label class="custom-control-label" for="Quests">Quests</label>
</div>

</div>
            

   <button type="button" class="btn-find">
                @if (App::isLocale('pt-BR'))
                 Procurar
                @elseif(App::isLocale('es'))
                 Buscar
                @else
                 Search
                @endif

              </button>
                        </div>
                      </div>

                    
                    
                
                <div class="others-search">
                    
                </div>
            </div>
            <div class="content-center col-xl-8 col-md-8 col-sm-12">
              @if (App::isLocale('pt-BR'))
                 <div class="order-by">
                    Ordenar por
                    <button type="button" value="recent" class="preferences btn btn-outline-secondary">Mais recente</button>
                    <button type="button" value="viewers" class="preferences btn btn-outline-secondary">Mais vistos</button>
                    <button type="button" value="trending" class="preferences btn btn-outline-secondary">Em Alta</button>
                </div>
                @elseif(App::isLocale('es'))
                 <div class="order-by">
                    Ordenar por
                    <button type="button" value="recent" class="preferences btn btn-outline-secondary">Más reciente</button>
                    <button type="button" value="viewers" class="preferences btn btn-outline-secondary">Más vistos</button>
                    <button type="button" value="trending" class="preferences btn btn-outline-secondary">En Alta</button>
                </div>
                @else
                 <div class="order-by">
                    Order By
                    <button type="button" value="recent" class="preferences btn btn-outline-secondary">Most Recent</button>
                    <button type="button" value="viewers" class="preferences btn btn-outline-secondary">Most Viewed</button>
                    <button type="button" value="trending" class="preferences btn btn-outline-secondary">Trending</button>
                </div>
                @endif


                
                <div class="feed">

                 <div class="row" id="loopvines" style="margin-left: 0;">

    @foreach($data as $value)
          <div class="col-lg-3 col-md-5 col-sm-12" style="padding:0px 5px 0px 0px;">
              <div class="card rounded border-0 bg-transparent">
                @if($value->type=='0')
                  <?php $img = "<i class='fas fa-image'></i>"; ?>
                @else
                  <?php $img = "<i class='fas fa-video'></i>"; ?>
                @endif

                  @if($value->type == '0')                  
                  <a href="{{App::getLocale()}}/{{$value->channel_name}}/{{$value->id}}">
                    <div class="imgtop">

                    <img class="hover-anim lazy card-img-top img-responsive" src="/images/default.jpg" data-src="/images/uploads/{{$value->link}}" alt="{{$value->title}}">

                  </div>

                  </a>                 

                  @else
                <?php $q = explode('=', $value->link);?>                
                <a href="{{App::getLocale()}}/{{$value->channel_name}}/{{$value->id}}">
                  <div class="imgtop">

                  <img src="/images/default.jpg" class="hover-anim lazy card-img-top img-responsive" data-src="https://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg">
                </div>

              </a>
                @endif


                <div class="card-body" style="padding:0px;">
                  <span class="card-title font-weight-bold">
                    <a href="{{$value->channel_name}}/{{$value->id}}" data-toggle="tooltip" data-placement="top" title="{{$value->channel_name}}" ><?= $img ?> {{$value->title}}</a>
                  </span>
                  <div class="clearfix"></div>                
                  <small class="text-muted"><i class="fas fa-globe-americas"></i> {{$value->server}}</small>
                  <div class="clearfix"></div>
                  <div class="clearfix">
                  <div class="clearfix"></div>
                  <small class="text-muted">  {{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</small>
                  </div>

                                    
                 </div>

              </div>
            </div>
            @endforeach
          
          </div>
        </div>
      </div>

                    
                </div>
            </div>
            </div>
            </div>
            
        </div>


        </div>


@endsection


  
