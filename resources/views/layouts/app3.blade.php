<!DOCTYPE html>
<html lang="en">

    <!--================================================================================
            Item Name: Materialize - Material Design Admin Template
            Version: 3.1
            Author: GeeksLabs
            Author URL: http://www.themeforest.net/user/geekslabs
    ================================================================================ -->


    <!-- Mirrored from demo.geekslabs.com/materialize/v3.1/layout-fullscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Oct 2016 05:09:18 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <title>Yaruma - Sistema de Gestión de Pagos de condominio</title>

        <!-- Favicons-->
        <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
        <!-- Favicons-->
        <link rel="apple-touch-icon-precomposed" href="images/condominio.ico">
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="images/condominio.ico">
        <!-- For Windows Phone -->


        <!-- CORE CSS-->    
        <link href="{{asset('css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{asset('css/style.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- CSS for full screen (Layout-2)-->    
        <link href="{{asset('css/layouts/style-fullscreen.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->    
        <link href="{{asset('css/custom/custom.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="{{asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{asset('js/plugins/jvectormap/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{asset('js/plugins/chartist-js/chartist.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


    </head>

    <body>
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->

        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed">
                <nav class="navbar-color">
                    <div class="nav-wrapper">
                        <ul class="left">                      
                            <li><h1 class="logo-wrapper"><a href="index-2.html" class="brand-logo darken-1">Yaruma</a> <span class="logo-text">Materialize</span></h1></li>
                        </ul>                      
                        <ul class="right hide-on-med-and-down">                            
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                                </a>
                            </li>                                                    
                        </ul>

                        <!-- notifications-dropdown -->
                        <ul id="notifications-dropdown" class="dropdown-content">
                            <li>
                                <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </header>        

        <!-- START MAIN -->
        <div id="main">
            <!-- START WRAPPER -->
            <div class="wrapper">

                <!-- START LEFT SIDEBAR NAV-->
                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details light-blue">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img src="images/silueta.jpg" alt="" class="circle responsive-img valign profile-image">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <ul id="profile-dropdown" class="dropdown-content">

                                        <li> <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="mdi-hardware-keyboard-tab"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                    <p class="user-roal">Administrator</p>
                                </div>
                            </div>
                        </li>

                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i class="mdi-social-group"></i>Propietarios</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li class="active"><a href="{{url('/nuevapersona')}}">Registro</a>
                                            </li>
                                            <li><a href="{{url('/persona')}}">Listado</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-location-city"></i> Servicios</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/servicios')}}">Registro de Servicios</a>
                                            </li>
                                            <li><a href="{{url('/servicios')}}">Listado Servicios</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Gastos</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/nuevosgastos')}}">Registrar Gastos</a>
                                            </li>
                                            <li><a href="{{url('/gastos')}}">Listado de Gastos</a>

                                        </ul>
                                    </div>
                                </li>
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-payment"></i> Pagos </span></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/nuevopago')}}">Registrar</a>
                                            </li>
                                            <li><a href="{{url('/')}}">Aprobar pagos</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-perm-identity"></i> Integrantes </span></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/nuevointegrante')}}">Registrar</a>
                                            </li>
                                            <li><a href="{{url('/integrantes')}}">Integrantes activos</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-file-folder-shared"></i> Cargos</span></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/nuevocargo')}}">Registrar</a>
                                            </li>
                                            <li><a href="{{url('/cargos')}}">Cargos</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </li>
                        <li class="li-hover"><div class="divider"></div></li>
                        <li class="li-hover"><p class="ultra-small margin more-text">MORE</p></li>
                        <li><a href="angular-ui.html"><i class="mdi-action-verified-user"></i> Seguridad <span class="new badge"></span></a>
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
                    </ul>
                    <!--a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light light-blue"><i class="mdi-navigation-menu"></i></a-->
                </aside>
                <!-- END LEFT SIDEBAR NAV-->

                <!-- //////////////////////////////////////////////////////////////////////////// -->

                <!-- START CONTENT -->
                <section id="content">

                    <!--start container-->
                    <div class="container">

                        @yield('content')

                    </div>
                    <!--end container-->
                </section>
                <!-- END CONTENT -->




            </div>


        </div>




        <!-- //////////////////////////////////////////////////////////////////////////// -->

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


        <!-- chartist -->
        <script type="text/javascript" src="{{ asset('js/plugins/chartist-js/chartist.min.js') }}"></script>   

        <!-- chartjs -->
        <script type="text/javascript" src="{{ asset('js/plugins/chartjs/chart.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/chartjs/chart-script.js') }}"></script>

        <!-- sparkline --> 
        <script type="text/javascript" src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/sparkline/sparkline-script.js') }}"></script>




        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="{{ asset('js/plugins.min.js') }}"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="{{ asset('js/custom-script.js') }}"></script>
        <!-- Toast Notification -->
        <script type="text/javascript">
                                                    $('.datepicker').pickadate({
                                                        selectMonths: true, // Creates a dropdown to control month
                                                        selectYears: 1, // Creates a dropdown of 15 years to control year,
                                                        today: 'Today',
                                                        clear: 'Clear',
                                                        close: 'Ok',
                                                        closeOnSelect: false // Close upon selecting a date,
                                                    });

        </script>
    </body>


    <!-- Mirrored from demo.geekslabs.com/materialize/v3.1/layout-fullscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Oct 2016 05:09:18 GMT -->
</html>