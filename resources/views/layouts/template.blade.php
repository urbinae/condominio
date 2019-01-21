<!DOCTYPE html>
<html lang="en">

    <!--================================================================================
            Item Name: Materialize - Material Design Admin Template
            Version: 3.1
            Author: GeeksLabs
            Author URL: http://www.themeforest.net/user/geekslabs
    ================================================================================ -->


    <!-- Mirrored from demo.geekslabs.com/materialize/v3.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Oct 2016 04:39:30 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Yaruma - Sistema de Gestión de Pagos de condominio</title>

        <!-- Favicons-->
        <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
        <!-- Favicons-->
        <link rel="apple-touch-icon-precomposed" href="images/condominio.ico">
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="images/condominio.ico">
        <!-- For Windows Phone -->




        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CORE CSS-->    
        <link href="{{asset('css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{asset('css/style.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">       

        <!-- Custome CSS-->    
        <link href="{{asset('css/custom/custom.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{asset('js/plugins/data-tables/css/jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="{{asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{asset('js/plugins/jvectormap/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/pie.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


        
        
        

        

        <style>


            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }

        </style>


    </head>

    <body>


        <?php $notificaciones = \App\Notificaciones::where('usuario', auth()->user()->id)->orderBy('id', 'DESC')->get() ?>

        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->

        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- START HEADER -->
        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed ">
                <nav class="navbar-color">
                    <div class="nav-wrapper light-blue">
                        <ul class="left">                      
                            <li><h1 class="logo-wrapper"><a href="index-2.html" class="brand-logo darken-1">Condomino Yaruma</a> <span class="logo-text">Materialize</span></h1></li>
                        </ul>
                        <div class="header-search-wrapper hide-on-med-and-down">


                        </div>
                        <ul class="right hide-on-med-and-down">                            
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                            </li>
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge black">{{count($notificaciones)}}</small></i>

                                </a>
                            </li>                                                    
                        </ul>                                               
                        <!-- notifications-dropdown -->
                        <ul id="notifications-dropdown" class="dropdown-content">

                            <li>
                                <h5>NOTIFICACIONES</h5>
                            </li>
                            <li class="divider"></li>
                            @if(count($notificaciones) > 0)
                            @foreach($notificaciones as $key)
                            <li>
                                <a href="#!"><i class="material-icons">person</i>{{$key->mensaje}}</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">{{$key->created_at}}</time>
                            </li>                          
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end header nav-->
        </header>
        <!-- END HEADER -->

        <!-- //////////////////////////////////////////////////////////////////////////// -->
<?php if (Auth::guest()){}else{?>
        <!-- START MAIN -->
        <div id="main">
            <!-- START WRAPPER -->
            <div class="wrapper">

                <!-- START LEFT SIDEBAR NAV-->
                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details light-blue lighten-4" style="background: none">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img src="images/silueta.jpg" alt="" class="circle responsive-img valign profile-image">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <ul id="profile-dropdown" class="dropdown-content">

                                        <li> <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">                                                 Cerrar Sesion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                    <p class="user-roal">
                                        <?php $cargo = \App\Cargo::find(auth()->user()->rol); ?>
                                        {{ucfirst($cargo->descripcionc)}}
                                    </p>
                                </div>
                            </div>
                        </li>     


                        @if(auth()->user()->rol == 1)
                        <li class="bold"><a href="{{url('/')}}" class="waves-effect waves-cyan"><i class="mdi-action-payment"></i> Pagos </span></a>                        
                        </li>
                        <li class="bold"><a href="{{url('apartamento')}}" class="waves-effect waves-cyan"><i class="mdi-action-store"></i> Apartamentos</a>                            
                        </li>
                        <li class="bold"><a href="{{url('gastos')}}" class="waves-effect waves-cyan"><i class="mdi-action-wallet-membership"></i> Gastos</a>                            
                        </li>
                        <li class="bold"><a href="{{url('cuentascobrar')}}" class="waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Cuentas por pagar</a>                            
                        </li>
                        <li class="bold"><a href="{{url('persona')}}" class="waves-effect waves-cyan"><i class="mdi-social-group"></i> Propietarios</a>                            
                        </li>    
                        <li class="bold"><a href="{{url('servicios')}}" class="waves-effect waves-cyan"><i class="mdi-social-location-city"></i> Servicios</a>                            
                        </li>  
                        <li class="bold"><a class="waves-effect waves-cyan" href="{{url('/integrantes')}}"><i class="mdi-action-perm-identity"></i> Integrantes </span></a>                                  
                        </li>
                        <li class="bold"><a class="waves-effect waves-cyan" href="{{url('/cargos')}}"><i class="mdi-file-folder-shared"></i> Cargos </span></a></li>                        
                        <li class="li-hover"><div class="divider"></div></li>
                        <li class="li-hover"><p class="ultra-small margin more-text">Mantenimiento</p></li>
                        <li><a href="#"><i class="mdi-action-verified-user"></i> Seguridad</a>
                        </li>
                        <li><a href="{{url('estadisticas')}}"><i class="mdi-editor-insert-chart"></i> Graficas</a>
                        </li>
                        <li class="li-hover">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="sample-chart-wrapper">                            
                                        <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        
                        
                        @if(auth()->user()->rol == 2)
                        <li class="bold"><a href="{{url('/')}}" class="waves-effect waves-cyan"><i class="mdi-action-payment"></i> Pagos </span></a>                        
                        </li>
                        <li class="bold"><a href="{{url('gastos')}}" class="waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Gastos</a>                            
                        </li>
                        <li class="bold"><a href="{{url('cuentascobrar')}}" class="waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Cuentas por pagar</a>                            
                        </li>                        
                        <li class="bold"><a href="{{url('servicios')}}" class="waves-effect waves-cyan"><i class="mdi-social-location-city"></i> Servicios</a>                            
                        </li>                                                  
                        <li class="li-hover"><div class="divider"></div></li>
                        <li class="li-hover"><p class="ultra-small margin more-text">Mantenimiento</p></li>
                        <li><a href="#"><i class="mdi-action-verified-user"></i> Seguridad</a>
                        </li>
                        <li><a href="{{url('estadisticas')}}"><i class="mdi-editor-insert-chart"></i> Graficas</a>
                        </li>
                        <li class="li-hover">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="sample-chart-wrapper">                            
                                        <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        
                        @if(auth()->user()->rol == 4)
                        <li class="bold"><a href="{{url('/')}}" class="waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Cobros</a>                            
                        </li>
                        <li class="bold"><a href="{{url('/mispagos')}}" class="waves-effect waves-cyan"><i class="mdi-action-payment"></i> Mis Pagos </span></a>                        
                        </li>                        
                        @endif
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
                </aside>
                <!-- END LEFT SIDEBAR NAV-->
                <?php }?>
                <!-- //////////////////////////////////////////////////////////////////////////// -->

                <!-- START CONTENT -->
                <section id="content">

                    <!--start container-->
                    <div class="container">
                        @yield('content')
                    </div>

                </section>


            </div>
            <!-- END WRAPPER -->

        </div>
        <!-- END MAIN -->



        <!-- START FOOTER -->
        <footer class="page-footer  light-blue">

            <div class="footer-copyright">
                <div class="container">
                    Copyright © 2017 IUTOMS 
                    <span class="right"> Desarrollado por el Grupo 4 seción 7024 </span>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->


        <!-- ================================================
        Scripts
        ================================================ -->

        <!-- jQuery Library -->
        <script type="text/javascript" src="{{ asset('js/plugins/jquery-1.11.2.min.js') }}"></script>
        <!--materialize js-->
        <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <!-- sparkline --> 
        <script type="text/javascript" src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/sparkline/sparkline-script.js') }}"></script>

        <script type="text/javascript" src="{{asset('js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/data-tables/data-tables-script.js')}}"></script>



        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="{{ asset('js/plugins.min.js') }}"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="{{ asset('js/custom-script.js') }}"></script>
        <!-- Toast Notification -->
        <script type="text/javascript">


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 1, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
});

$('.table').DataTable();

        </script>
    </body>



    <!-- Mirrored from demo.geekslabs.com/materialize/v3.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Oct 2016 04:53:39 GMT -->
</html>