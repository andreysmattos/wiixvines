@extends('painel.layouts.painel')
@section('title', 'Controle')
@section("background", 'background-color:#f6f7f2;')
@section('content')
<div class="container page-wrapper chiller-theme toggled">
<div class="row" style="margin:0;">
 @include('painel.components.sidebar-panel-dev')
 @include('painel.components.model-sidebar-panel-dev')
        
        <!-- sidebar-wrapper  -->
        <main class="page-content col-xl-8 col-md-12 col-sm-12">
            <div class="container-fluid">

                    <div class="row col-md-12" style="margin: 0;padding:0;">
                        <div class="padding-space col-md-4 clean-pt ">
                            <div class="widget-dash">
                                
                                    <i class="fas fa-users"></i>
                                <div class="clearfix"></div>

                                <div class="number-count"> 
                                    89                                    
                                </div>
                                <span>Seguidores</span>


                                
                            </div>
                        </div>
                        <div class="padding-space col-md-4 clean-pt">
                            <div class="widget-dash">
                            
                                <i class="fas fa-street-view"></i>
                                <div class="clearfix"></div>
                                <div class="number-count"> 
                                    89                                    
                                </div>
                            
                                <span>Vizualizações</span>

                                
                            </div>
                        </div>
                        <div class="padding-space col-md-4 clean-pt ">
                            <div class="widget-dash">
                                
                                    <i class="fas fa-archive"></i> 
                                <div class="clearfix"></div>
                                    
                                <div class="number-count"> 
                                    89                                    
                                </div>
                                
                                

                                <span>Posts</span>

                                
                            </div>
                        </div>


                    </div>
                    
                <div class="main-content" >
                    <div class="configatuais col-xl-12 col-md-10">

                <button type="button" class="btn btn-demo toggle-sidebar" data-toggle="modal" data-target="#sidebarmodal">
                <div>
                    <span class="fas fa-bars"></span>
                </div>
                </button>
            

                        <h1>Atalhos</h1>
                        
                            <div class="row" style="margin:0;padding:0;text-align: center;">
                            
                            <div class="boxing-dash col-md-4 col-sm-4 col-xl-4">
                                <a href="/user/studio">
                                <div class="smart-box">
                                    <img src="{{asset('images/theme_editor.png')}}" alt="">
                                    <span>Personalizar</span>
                                </div>
                                </a>
                            </div>                           

                            <div class="boxing-dash col-md-4 col-sm-4 col-xl-4">
                                <a href="/user/upload-photo">
                                <div class="smart-box">
                                    <img src="{{asset('images/new-photo.png')}}" alt="">
                                    <span>Nova foto</span>
                                </div>
                                </a>>
                            </div>

                            <div class="boxing-dash col-md-4 col-sm-4 col-xl-4">
                                <a href="/user/shop">                                
                                <div class="smart-box">
                                    <img src="{{asset('images/buy-coins.png')}}" alt="">
                                    <span>Shop</span>
                                </div>
                                </a>
                            </div>


                            </div>
                        
                    
                </div>
                </div>
                

  
                <hr>
                
            </div>
    </main>
    <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
</div>
{{-- container --}}
</div>
@endsection