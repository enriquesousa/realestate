@php
    // Recuperamos datos de site settings de la tabla 'site_settings'
    $settings = App\Models\SiteSetting::find(1);
@endphp

<!-- main header -->
<header class="main-header">

    <!-- header-top en background negro una sola linea -->
    <div class="header-top">
        <div class="top-inner clearfix">



            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>{{ $settings->company_address }}</li>
                    <li><i class="far fa-clock"></i>{{ $settings->horario }}</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">{{ $settings->support_phone }}</a></li>
                </ul>
            </div>

            <div class="right-column pull-right">

                <ul class="social-links clearfix">
                    <li><a href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ $settings->twitter }}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>

                {{-- Si user esta login --}}
                @auth
                    <div class="sign-box">
                        <span class="text-white"><i class="fas fa-user"></i>&nbsp;{{ Auth::user()->name }}&nbsp;&nbsp;</span>
                        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i>Panel</a>
                        <a href="{{ route('user.logout') }}" class="pl-3"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
                    </div>
                @else
                    {{-- <div class="sign-box">
                        <label for="">Iniciar Sesión: </label>
                    </div> --}}

                    {{-- User Login --}}
                    <div class="sign-box">

                        {{-- app/Http/Controllers/Auth/AuthenticatedSessionController.php --}}
                        <a href="{{ route('login') }}" class="pl-2"><i class="fas fa-sign-in-alt"></i> Acceder</a>

                        <a href="{{ route('user.register') }}" class="pl-2"><i class="fas fa-user-plus"></i> Registrarse</a>


                        {{-- Para usar ventana modal incluir @include('partials.login') --}}
                        {{-- <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i> Iniciar Sesión</a> --}}

                    </div>

                    {{-- <div class="sign-box">
                        <a href="{{ route('agent.login') }}" class="pl-2">Agent<i class="fas fa-user"></i> </a>
                    </div>
                    <div class="sign-box">
                        <a href="{{ route('admin.login') }}">Admin<i class="fas fa-user"> </i></a>
                    </div> --}}

                @endauth

            </div>

        </div>
    </div>

    <!-- header-lower, donde esta el logo y menus -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('casa') }}"><img src="{{ asset($settings->logo) }}" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">

                                {{-- Home Inicio --}}
                                <li class=""><a href="{{ url('/') }}"><span>Inicio</span></a></li>

                                {{-- Nosotros --}}
                                <li class=""><a href="{{ url('/') }}"><span>Nosotros</span></a></li>

                                {{-- Propiedades --}}
                                <li class="dropdown"><a href="#"><span>Propiedades</span></a>
                                    <ul>
                                        <li><a href="{{ route('rent.list.property') }}">Para Renta</a></li>
                                        <li><a href="{{ route('buy.list.property') }}">Para Compra</a></li>
                                        <li><a href="{{ route('all.list.property') }}">Todas</a></li>
                                    </ul>
                                </li>

                                {{-- Agente --}}
                                <li class="dropdown">
                                    <a href="#"><span>Agente</span></a>
                                    <ul>
                                        <li><a href="{{ route('agent.login') }}">Agente Login</a></li>
                                        <li><a href="{{ route('admin.login') }}">Admin Login</a></li>
                                    </ul>
                                </li>

                                {{-- Blog --}}
                                <li class=""><a href="{{ route('blog.list') }}"><span>Noticias</span></a></li>

                                {{-- Contact --}}
                                <li><a href="#"><span>Contáctanos</span></a></li>

                                {{-- Add Listing --}}
                                <li><a href="{{ route('agent.login') }}" class="btn btn-success"><span>+</span>Agregar Propiedad</a></li>

                            </ul>
                        </div>
                    </nav>
                </div>
                {{-- <div class="btn-box">
                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div> --}}
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('casa') }}"><img src="{{ asset($settings->logo) }}" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="{{ route('agent.login') }}" class="theme-btn btn-one"><span>+</span>Agregar Propiedad</a>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- main-header end -->

{{-- Ventana modal para Login --}}
@include('partials.login')
