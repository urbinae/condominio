<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Condominio</title>

        <!-- Styles -->

        <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
       


    </head>
    <body>

        <script type="text/javascript" src="{{asset('jquery-3.2.1.min.js')}}"></script>

        <div id="app">
            <div class="navbar-fixed">
                    
                    <nav>
                      
                      <div class="nav-wrapper blue accent-2">
                        
                        <a href="#!" class="brand-logo">Condominio Yaruma</a>
                        
                        <ul class="right hide-on-med-and-down">
                          
                           <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li>
                                <a href="{{url('/persona')}}">Inquilinos</a>
                            </li>
                            <li>
                                <a href="{{url('/servicios')}}">Servicios</a>
                            </li>
                            <li>
                                <a href="{{url('/')}}">Pagos</a>
                            </li>
                    <!--   <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>-->
                            <!-- Dropdown Structure -->
                                <ul id="dropdown" class="dropdown-content">
                                  <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                  
                                </ul>
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="dropdown">
                                {{ Auth::user()->name }}
                                    <i class="material-icons right">arrow_drop_down</i>
                                </a>
                            </li>
                            @endif
                        
                        </ul>
                      
                      </div>

                    </nav>
            </div>


            @yield('content')
        </div>
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="{{asset('materialize/js/materialize.min.js')}}"></script>

        <script type="text/javascript">
    
    $('select').material_select();
  

    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
</script>
    </body>
</html>
