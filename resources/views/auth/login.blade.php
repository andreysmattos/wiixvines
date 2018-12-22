@extends('layouts.authpage')
@section('title', 'Login')


@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4">
            <div class="d-flex justify-content-center">
                <a href="/"><img src="{{ asset('/images/logo-icon.png') }}" title="TibiaVines" /></a>
            </div>
            
            <div class="text-center text-uppercase h4 font-weight-light">
                Login
            </div>
            <div class="bg-vines text-light font-weight-light text-center rounded pt-2 pb-2" class="erroinsert" id="msgerro">              
            </div>

                <div class="card-body py-3">
                <div class="panel-body form-loginvines">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="font-weight-bold">Email or Username</label>

                            
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="font-weight-bold">Password</label>

                            
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-vines">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <div class="card-footer">
                <span>New Here? <a href="{{route('register')}}">Register!<a></span>
            </div>
                                
                            </div>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
