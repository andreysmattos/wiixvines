@extends('painel.layouts.base')
@section('title', 'TibiaVines - Studio')
@section('painel-menu')
        <div class="sidebar">
        
            <nav class="sidebar-nav" id="sidebar">
                <ul class="nav">
                    <li class="nav-title">Dashboard</li>

                    <li class="nav-item">
                        <a href="control-panel" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i> Sumary
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="last-interactions" class="nav-link">
                            <i class="fab fa-angellist"></i> Latest interactions 
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="control-panel" class="nav-link">
                            <i class="fas fa-address-book"></i> Subscribes
                        </a>
                    </li>


                    <li class="nav-title">Channel Library</li>

                    <li class="nav-item">
                        <a href="upload-photo" class="nav-link">
                            <i class="fas fa-image"></i> Upload Photo
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="upload-vine" class="nav-link">
                            <i class="fas fa-video"></i> Upload Vines
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a href="studio" class="nav-link" disabled>
                            <i class="fas fa-tasks"></i> Studio
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="vines" class="nav-link">
                            <i class="fas fa-sliders-h"></i> Vines manager
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="control-panel" class="nav-link disabled">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>                 


                 </ul>
          
               </li>



                   
                </ul>
            </nav>
        </div>
@endsection
@section('content')

Not found.
@endsection