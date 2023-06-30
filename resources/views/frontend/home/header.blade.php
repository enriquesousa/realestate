<!-- main header -->
<header class="main-header">

    <!-- header-top en background negro una sola linea -->
    <div class="header-top">
        <div class="top-inner clearfix">

            @php
                // Recuperamos datos de tabla topbar_data
                $topbarData = App\Models\TopbarData::find(1);
            @endphp

            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>{{ $topbarData->address }}</li>
                    <li><i class="far fa-clock"></i>{{ $topbarData->horario }}</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">{{ $topbarData->phone }}</a></li>
                </ul>
            </div>

            <div class="right-column pull-right">

                <ul class="social-links clearfix">
                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>

                @auth
                    <div class="sign-box">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i>Panel</a>
                        <a href="{{ route('user.logout') }}" class="pl-3"><i class="fas fa-user"></i>Cerrar Sesión</a>
                    </div>
                @else
                    <div class="sign-box">
                        <label for="">Iniciar Sesión: </label>
                    </div>
                    <div class="sign-box">
                        {{-- app/Http/Controllers/Auth/AuthenticatedSessionController.php --}}
                        {{-- redirige a iniciar sesión en resources/views/auth/login.blade.php --}}
                        {{-- Si login es correcto lo redirige a resources/views/dashboard.blade.php  --}}
                        <a href="{{ route('login') }}" class="pl-2">User<i class="fas fa-user"></i> </a>
                    </div>
                    <div class="sign-box">
                        <a href="{{ route('agent.login') }}" class="pl-2">Agent<i class="fas fa-user"></i> </a>
                    </div>
                    <div class="sign-box">
                        <a href="{{ route('admin.login') }}">Admin<i class="fas fa-user"> </i></a>
                    </div>
                @endauth

            </div>

        </div>
    </div>

    <!-- header-lower, donde esta el logo y menus -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('casa') }}"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
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
                                    </ul>
                                </li>

                                {{-- Agente --}}
                                <li class=""><a href="{{ url('/') }}"><span>Agente</span></a></li>

                                {{-- Blog --}}
                                <li class=""><a href="{{ url('/') }}"><span>Blog</span></a></li>

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
                    <figure class="logo"><a href="{{ route('casa') }}"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- main-header end -->
