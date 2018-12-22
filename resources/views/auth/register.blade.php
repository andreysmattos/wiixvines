@extends('layouts.authpage')
@section('title', 'Register')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4">
            <div class="d-flex justify-content-center">
                <a href="/"><img src="{{ asset('/images/logo-icon.png') }}" title="TibiaVines" /></a>
            </div>
            
            <div class="text-center text-uppercase h4 font-weight-light">
                Register
            </div>
            <div class="bg-vines text-light font-weight-light text-center rounded pt-2 pb-2" class="erroinsert" id="msgerro">              
            </div>

                <div class="card-body py-3">
                <div class="panel-body form-loginvines">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                                         
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="font-weight-bold">Email</label>

                            
                         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="clearfix"></div>
                                <small class="text-muted help-block">
                                    Your email address will show on your profile page, but TibiaVines will never share or sell it.
                                </small>
                            
                        </div>

                        <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="name" class="font-weight-bold">Username</label>

                            
                                <input id="name" type="text" class="form-control" name="login" value="{{ old('login') }}" required>

                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
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
                            <label for="password-confirm" class="font-weight-bold">Confirm Password</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            
                        </div>
                        <div class="form-group">
                            <div>
                                
                                    <p>In order to protect your account, make sure your password:</p>
<ul>    
<li>Is longer than 7 characters</li>
<li>Does not match or significantly contain your username, e.g. do not use 'username123'.</li>
<li>Is not a member of this list of common passwords</li>
</ul>

</div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-vines">
                                    Register
                                </button>
                            </div>
                        </div>
                        <div class="card-footer">
                        <span>Already have an account?<a href="{{route('login')}}"> Sign in<a></span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
