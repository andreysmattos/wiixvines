   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="-moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/images/logo2.png" alt="TibiaVines" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link {{ Request::is( '/') ? 'active' : '' }}" href="/">Posts
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item {{ Request::is( 'channels') ? 'active' : '' }}">
              <a class="nav-link" href="/channels">Channels
                <span class="sr-only">(current)</span>
              </a>
            </li>            
            @if(auth::check())
            <li class="nav-item {{ Request::is( 'feed') ? 'active' : '' }}">
              <a class="nav-link" href="/feed">Feed
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <hr>   
            @include('navbar.login_dropdown')
        </div>
      </div>
    </nav>