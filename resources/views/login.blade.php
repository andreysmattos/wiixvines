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
                Login
            </div>
            <div class="bg-info text-light font-weight-light text-center rounded pt-2 pb-2" class="erroinsert" id="msgerro"></div>
            <form action="" method="POST">
                <div class="card-body py-5">
                    <div class="form-group">
                        <label class="form-control-label">Login:</label>
                        <input type="text" class="form-control" name="login" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Senha</label>
                        <input type="password" class="form-control" name="pass" required>
                    </div>
                    <input type="hidden" name="log" value="in">
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-info btn-block" name="loginpag">Login</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('password.request') }}" class="btn btn-link">Esqueceu a senha?</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span>Novo aqui? <a href="/register">Cadastre-se<a></span>
            </div>
        </div>
    </div>
</div>
@endsection