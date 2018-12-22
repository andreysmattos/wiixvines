   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background:url(/images/header-tex.png);-webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/images/logo2.png" alt="TibiaVines" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link {{ Request::is( '/') ? 'active' : '' }}" href="/">
                @if (App::isLocale('pt-BR'))
    Página inicial
@elseif(App::isLocale('es'))
    Página inicial
@else
    Home
@endif
                <span class="sr-only">(current)</span>
              </a>
            </li>                      
            @if(auth::check())
            <li class="nav-item {{ Request::is( 'feed') ? 'active' : '' }}">
              <a class="nav-link" href="/feed">
              @if (App::isLocale('pt-BR'))
    Meus seguidos
@elseif(App::isLocale('es'))
    Mis seguidos
@else
    My followers
@endif

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