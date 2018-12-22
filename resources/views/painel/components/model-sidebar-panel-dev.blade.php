    <div class="modal left fade" id="sidebarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="padding:0 0 0 0;">

<nav id="sidebar" class="sidebar-wrapper modal-side" style="padding: 0 0 0 0;position:fixed;height:100%;left:0;top:0;">
            <div class="sidebar-content">
                
                <div class="sidebar-header">
                    <div class="user-pic" >
                        <img class="img-responsive img-rounded" src="{{asset("/images/profile-images/default.png")}}" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon
                            <strong>Smith</strong>

                        </span>
                        
                        {{-- <span class="user-role">King</span> --}}
                        <span class="user-status ">
                            <i class="fa fa-circle true"></i>
                            <span>Premium</span>
                        </span>
                    </div>
                </div>

                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="valor-do-usuario">
                        <span class="font-weight-700" style="color:#444">Saldo:</span> <span>175 coins</span>
                            
                            <div class="clearfix"></div>
                            <div class="allsaldo col-md-12" style="padding:0 0 0 0;margin:0 0 0 0;">
                                <div class="row">
                            </div>
                            </div>
                            
                            

                           
                            
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Geral</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-file-alt"></i>
                                <span>Resumo</span>                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/user/control-panel">Inicio                                            
                                        </a>
                                    </li>
                                    <li>                                        
                                    <a href="/{{auth::user()->channel_name}}">Meu Canal
                                    </a>
                                    </li>
                                    <li>
                                        <a href="/user/statistics">Estatísticas                                            
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/user/news">Novidades                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>      
                        <li>
                            <a href="/user/upload-photo">
                                <i class="fas fa-palette"></i>
                                <span>Posta Foto</span>
                            </a>
                        </li>
                        <li>
                            <a href="/user/studio">
                                <i class="fas fa-palette"></i>
                                <span>Customizar</span>
                            </a>
                        </li>                  
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-images"></i>
                                <span>Posts</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    
                                    <li>
                                        <a href="/user/upload-photo">Posta Foto
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/user/upload-vine">Compartilhar video</a>
                                    </li>
                                    <li>
                                        <a href="/user/upload-photo">Minhas fotos/videos
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-people-carry"></i>
                                <span>Interação</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/user/last-interactions">Quem eu sigo?</a>
                                    </li>
                                    <li>
                                        <a href="/user/my-comments">Comentários</a>
                                    </li>                                    
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Shop</span>  
                                 <span class="badge badge-pill badge-danger">Hot</span>                              
                            </a>
                            <div class="sidebar-submenu">
                                <ul>                                                                      
                                    <li>
                                        <a href="/user/donate" style="color:red;">Donate</a>
                                    </li>                                    
                                    <li>
                                        <a href="/user/donate-history">Histórico                                                                       
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/user/manual">Manual</a>
                                    </li> 
                                </ul>
                            </div>
                        </li>
                        
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                 {{--        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Albuns</span>
                            </a>
                        </li>
                       <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Regras de uso</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Reports</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Histórico</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-lock"></i>
                                <span>Segurança</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/user/settings">Configurações</a>
                                    </li>
                                    <li>
                                        <a href="#">Histórico de conexões</a>
                                    </li>
                                    <li>
                                        <a href="#">Bloqueios</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#" class="sidebar-abugado">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
                    

                </div>
            </div>
        </div>
</div>
<!-- container -->