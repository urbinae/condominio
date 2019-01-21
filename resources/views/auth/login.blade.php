@extends('layouts.login')

@section('content')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form"  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="images/condominio.jpg" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Sistema de Gestiòn de Pago Condominio Yaruma</p>
                </div>
            </div>
            <div class="row margin{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <label for="username" class="center-align">E-mail</label>
                </div>
            </div>
            <div class="row margin{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <div class="row">          
                <div class="input-field col s12 m12 l12  login-text">
                    <input type="checkbox" name="remember" >
                    <label for="remember-me">Recordarme</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn indigo darken-4" style="width: 100%">
                        Acceder
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <!--  <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="{{ route('register') }}">Registrarse</a></p>
                      </div>-->
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Olvide contraseña</a></p>
                    </div>          
                </div>

        </form>
    </div>
</div>



@endsection
