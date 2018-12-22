@extends('layouts.authpage')
@section('title')
<title>TibiaVines - Login</title>
@endsection

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4">
            <div class="d-flex justify-content-center">
                <a href="/"><img src="{{ asset('/images/logo.png') }}" title="TibiaVines" /></a>
            </div>
            
            <div class="text-center text-uppercase h4 font-weight-light">
                Admin Login
            </div>
            <div class="bg-info text-light font-weight-light text-center rounded pt-2 pb-2" class="erroinsert" id="msgerro">              
            </div>

                <div class="card-body py-3">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('adminLogin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-mail</label>

                            
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>

                            
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    Login
                                </button>
                                
                            </div>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
