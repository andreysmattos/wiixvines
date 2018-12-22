   <nav class="navbar navbar-expand-lg bg-white fixed-top" style="transition: background-color 250ms linear;
    box-shadow: 0px 1px 4px 1px rgba(0,0,0,.12);border-bottom: 1px solid #ccc;">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset('/images/logo2.png')}}" alt="TibiaVines" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="color:#000;">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          	<li class="nav-item">
              <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 10px;font-size:1.2em;">
                            	
                            		<i class="fas fa-globe-americas"></i> {{App::getLocale()}}
                            	
                                



                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.4);font-size:1.2em;">
                                
                            	<a href="/pt-BR" class="dropdown-item">
                                    Português
                                </a>

                                <a href="/es" class="dropdown-item">
                                    Español
                                </a>

                                 <a href="/en" class="dropdown-item">
                                    English
                                </a>
                            </div>
            </li> 

            <li class="nav-item">
              <a class="nav-link {{ Request::is( '/') ? 'active' : '' }}" href="/" >
                <div class="menu-circleitem"  data-toggle="tooltip" data-placement="bottom" title="Inicio">
                  <div class="menu-icon">
                      <div class="insta-icons search-icon" ></div>
                    
                  </div>
                  {{-- <span>Home</span> --}}
                </div>
                {{-- @if (App::isLocale('pt-BR'))
    Página inicial
@elseif(App::isLocale('es'))
    Página inicial
@else
    Home
@endif --}}
                <span class="sr-only">(current)</span>
              </a>
            </li>                      
            @if(auth::check())
            <li class="nav-item {{ Request::is( 'feed') ? 'active' : '' }}">
              <a class="nav-link" href="/feed">
                <div class="menu-circleitem" data-toggle="tooltip" data-placement="bottom" title="Feed">
                  <div class="menu-icon">
                      <div class="insta-icons feed-icon"></div>
                    
                  </div>
                  {{-- <span>Home</span> --}}
                </div>

{{--               @if (App::isLocale('pt-BR'))
    Meus seguidos
@elseif(App::isLocale('es'))
    Mis seguidos
@else
    My followers
@endif --}}

                <span class="sr-only">(current)</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <hr>   


@if (App::isLocale('pt-BR'))
    @include('navbar.dropdown_pt-br')
@elseif(App::isLocale('es'))
    @include('navbar.dropdown_es')
@else
    @include('navbar.dropdown_en')
@endif
            
        </div>
      </div>
    </nav>