@extends('layouts.reset')

@section('content')
<div id="login-page" class="row"  style="padding: 2% 10% 0% 10%">
    <div class="col l4 s12 offset-l4 z-depth-4 card-panel">
        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Recuperar contraseña</h4>                    
                </div>
            </div>
            @if(count($errors) > 0)

            <div class="row errorbox">
                <div class="col s12">
                    <div class="collection">
                        @foreach($errors->all() as $error)
                        <a href="#!" class="collection-item  red lighten-3" style="color: white"> {{$error}}</a>                                
                        @endforeach
                    </div>
                </div>
            </div>       
            @endif
            @if (session('status'))
            <div class="row errorbox">
                <div class="col s12">
                    <div class="collection">                        
                        <a href="#!" class="collection-item  green lighten-3" style="color: white"> {{ session('status') }}</a>                                                        
                    </div>
                </div>
            </div>  

            @endif            
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>                     
                    <input id="email" name="email" type="email">
                    <label for="email" class="center-align">Correo electrónico</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>                     
                    <input id="password" name="password" type="password">
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>                     
                    <input id="password-confirm" type="password" name="password_confirmation">
                    <label for="password_confirmation">Confirmar contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light green col s12">Recuperar contraseña</button>
                </div>
                <div class="input-field col s12">
                    <p class="margin center medium-small sign-up">¿Ya recordastes?. <a href="{{route('login')}}">Acceder</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
