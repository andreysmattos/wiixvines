 @if (Auth::check())

           {{--  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-bell text-danger"></i> 0
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                Nothing new..
                              </a>
                            </div>

                          </li> --}}

          <li class="nav-item dropdown">
                            <a class="nav-link image-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('images/profile-images/default.png')}}" class="rounded-circle" width="32" height="32" alt="{{ Auth::user()->login }}">


                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar_pro" style="font-size:1.2em;">
                                <div class="header">
                                    
                                        <a href="/" class="a-dropnav">   

                                        {{-- <div class="row" style="margin:0;padding:0;"> --}}
                                            
                                            <div class="image-drop">
                                                <img src="{{asset('images/profile-images/default.png')}}" alt="{{ Auth::user()->login }}">
                                            </div>
                                            <div class="description-drop">
                                                <span class="login">{{ Auth::user()->login }}</span>
                                                <small class="email">tibiaxp.com/{{ Auth::user()->channel_name }}</small>
                                            </div>

                                                                               
                                            
                                        </a>
                                        
                                    
                                </div>
                                <div class="boxing-item">
                                <a href="/user/control-panel" class="dropdown-item">
                                    <i class="pr-2 fas fa-tachometer-alt"></i> Resumo
                                </a>
                                </div>
                                <div class="dropdown-header bg-light text-center">Canal</div>
                                <div class="boxing-item">

                                @if(auth::user()->channel_name != null)


                                <a href="/{{auth::user()->channel_name}}" class="dropdown-item">
                                    <i class="fas fa-images"></i> Minha Página
                                </a>
                                @else
                                <a href="/user/create-channel" class="dropdown-item">
                                    <i class="fas fa-images"></i> Criar um Canal
                                </a>
                                @endif
                                
                                <a href="/user/upload-photo" class="dropdown-item">
                                    <i class="pr-2 fas fa-cloud-upload-alt"></i> Enviar Fotos
                                </a>

                                <a href="/user/upload-vine" class="dropdown-item">
                                    <i class="pr-2 fas fa-cloud-upload-alt"></i> Enviar um Video
                                </a>
                                <a href="/user/vines" class="dropdown-item">
                                    <i class="pr-2 far fa-file-video"></i> Painel de Controle
                                </a>
                                <a href="/user/studio" class="dropdown-item">
                                    <i class="pr-2 fas fa-cog"></i> Personalizar
                                </a>
                            </div>
                                <div class="dropdown-header bg-light text-center">Perfil</div>
                                <div class="boxing-item">

                                <a href="/user/settings" class="dropdown-item">
                                    <i class="pr-2 fa fa-wrench"></i> Configurações
                                </a>
                                {{-- <div class="dropdown-divider"></div> --}}

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="dropdown-item">
                                    <i class="pr-2 fa fa-lock"></i> Sair
                                </a>
                                
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            </div>
                        </li>
            @else
 <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                
               <li class="nav-item {{ Request::is( 'channels') ? 'active' : '' }}">
              <a class="nav-link btn-find text-white" style="font-weight: 600;padding:10px 20px 10px 20px;" href="{{route('login')}}">FAZER LOGIN
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            {{-- <div class="separator-vertical"></div>   --}}
            <li class="nav-item text-center">
              <a class="nav-link btn-find text-white" style="margin-left:10px;padding:10px 20px 10px 20px; font-weight: 600;" href="{{route('register')}}">CRIAR CONTA</a>
            </li>

            @endif

      
          </ul>