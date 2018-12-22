<div class="sidebar bg-white border" style="-webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;
-moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
        
            <nav class="sidebar-nav" id="sidebar">
                <ul class="nav">
                    <li class="nav-title">Dashboard</li>

                    <li class="nav-item">
                        <a href="control-panel" class="nav-link btn btn-light text-left {{ Request::is( 'user/control-panel') ? 'active' : '' }} " >
                            <i class="fas fa-tachometer-alt"></i> Sumary
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="last-interactions" class="nav-link btn btn-light text-left {{ Request::is( 'user/last-interactions') ? 'active' : '' }}">
                            <i class="fab fa-angellist"></i> Latest interactions 
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="following" class="nav-link btn btn-light text-left {{ Request::is( 'user/following') ? 'active' : '' }}">
                            <i class="fas fa-address-book"></i> Following
                        </a>
                    </li>


                    <li class="nav-title">Channel Library</li>

                    <li class="nav-item">
                        <a href="upload-photo" class="nav-link btn btn-light text-left {{ Request::is( 'user/upload-photo') ? 'active' : '' }}">
                            <i class="fas fa-image"></i> Upload Photo
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="upload-vine" class="nav-link btn btn-light text-left {{ Request::is( 'user/upload-vine') ? 'active' : '' }}">
                            <i class="fas fa-video"></i> Upload Vines
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a href="studio" class="nav-link btn btn-light text-left {{ Request::is( 'user/studio') ? 'active' : '' }}">
                            <i class="fas fa-tasks"></i> Studio
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="vines" class="nav-link btn btn-light text-left {{ Request::is( 'user/vines') ? 'active' : '' }}">
                            <i class="fas fa-sliders-h"></i> Vines manager
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="settings" class="nav-link btn btn-light text-left {{ Request::is( 'user/settings') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>                 


                 </ul>
          
               </li>



                   
                
            </nav>
        </div>