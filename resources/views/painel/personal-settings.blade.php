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
                            <div class="card-header bg-light">
                                Settings 
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
                                <table class="table border-0">
                                    <tr class="border rounded"><td>Channel Name: </td><td> /{{auth::user()->channel_name}}</td></td><td></tr>                                 
                                    <tr class="border rounded"><td>Keycode: </td><td> {{$keycode}}</td></td><td></tr>                                 

                                    <tr class="border rounded"><td>Email: </td><td id="email-area">•••••••••••••••••••••</td><td><button type="button" class=" float-right border-0 btn-outline-info" id="emailshow">Show</button></td></tr>
                                    <tr class="border rounded"><td>Login: </td><td id="login-area">•••••••••••</td><td><button type="button" class=" float-right border-0 btn-outline-info" id="loginshow">Show</button></td></tr>

                                    <tr class="border rounded">
                                        <td>Password: </td>
                                        <td>•••••••••••</td>
                                        <td>
                                            <a href="/user/change-password">
                                            <button type="button" class="float-right border-0 btn-outline-info">Reset</button>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr class="border rounded"><td>Promoted?</td><td> No</td></td><td></tr>
                                    <tr class="border rounded"><td>Started:</td><td> {{Carbon\Carbon::parse(auth::user()->created_at)->format('d/m/Y H:i')}}</td></td></td><td></tr>                                   
                                </table>
                                                                <div class="row">

                                    <div class="col-md-12">

                            
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#emailshow').click(function(){
            if($('#emailshow').html() == 'Show'){
                $('#email-area').html('{{ auth::user()->email}}');
                $('#emailshow').html('Hide');
            }else{
                $('#email-area').html('•••••••••••••••••••••');
                $('#emailshow').html('Show');

            }
            
            
        })
        $('#loginshow').click(function(){
            if($('#loginshow').html() == 'Show'){
                $('#login-area').html('{{ auth::user()->login}}');
                $('#loginshow').html('Hide');
            }else{
                $('#login-area').html('•••••••••••');
                $('#loginshow').html('Show');

            }
        })
    })
</script>
@endsection