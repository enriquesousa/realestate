@extends('frontend.frontend_dashboard')
@section('main')

@php
    Config::set('custom.display_preload', false)
@endphp


<!--Page Title-->
{{-- <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Iniciar sesión</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Iniciar sesión</li>
            </ul>
        </div>
    </div>
</section> --}}
<!--End Page Title-->

<!-- agent-details -->
<section class="agent-details">
    <div class="auto-container">
        <div class="agent-details-content">
            <div class="agents-block-one">
                <div class="inner-box mr-0">

                    <figure class="image-box"><img src="{{ url('upload/login-pict.png') }}" alt="" style="width:270px; height:330px;"></figure>

                    {{-- content-box --}}
                    <div class="content-box">

                        <div class="upper clearfix">
                            <div class="title-inner pull-left">
                                <h4>Iniciar Sesión </h4>
                                <span class="designation">Usuario</span>
                            </div>

                            <ul class="social-list pull-right clearfix">
                                <li><a href="agents-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="agents-details.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="agents-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>

                        {{-- Login and Register con Tabs --}}
                        <!-- ragister-section -->
                        <section class="ragister-section centred sec-pad">
                            <div class="auto-container">
                                <div class="row clearfix">
                                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                                        <div class="sec-title">
                                            <h3>Inicia Sesión para Usuario</h3>
                                        </div>

                                        <div class="tabs-box">

                                            {{-- Tabs Login y Register --}}
                                            <div class="tab-btn-box">
                                                <ul class="tab-btns tab-buttons centred clearfix">
                                                    <li class="tab-btn active-btn" data-tab="#tab-1">Acceso</li>
                                                    <li class="tab-btn" data-tab="#tab-2"> Regístrate</li>
                                                </ul>
                                            </div>

                                            <div class="tabs-content">

                                                {{-- tab-1 Login --}}
                                                <div class="tab active-tab" id="tab-1">
                                                    <div class="inner-box">

                                                        <h4>Inicia Sesión</h4>
                                                        <form action="{{ route('login') }}" method="post" class="default-form">
                                                        @csrf

                                                            {{-- Nombre --}}
                                                            <div class="form-group">
                                                                <label>Nombre/Correo/Teléfono</label>
                                                                <input type="text" name="login" id="login" required="">
                                                            </div>

                                                            {{-- Password --}}
                                                            <div class="form-group">
                                                                <label>Contraseña</label>
                                                                <input type="password" name="password" id="password" required="">
                                                            </div>

                                                            {{-- botón Sign In --}}
                                                            <div class="form-group message-btn">
                                                                <button type="submit" class="theme-btn btn-one">Iniciar</button>
                                                            </div>

                                                        </form>
                                                        <div class="othre-text">
                                                            <p>No tienes una cuenta? <a href="#">Da Click en pestaña de Regístrate</a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- tab-2 Regístrate --}}
                                                <div class="tab" id="tab-2">
                                                    <div class="inner-box">
                                                        <h4>Registrarse</h4>

                                                        <form action="{{ route('register') }}" method="POST" class="default-form">
                                                            @csrf

                                                            {{-- Nombre --}}
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input type="text" name="name" id="name" required="">
                                                            </div>

                                                            {{-- Email --}}
                                                            <div class="form-group">
                                                                <label>Correo Electrónico</label>
                                                                <input type="email" name="email" id="email" required="">
                                                            </div>

                                                            {{-- Password --}}
                                                            <div class="form-group">
                                                                <label>Contraseña</label>
                                                                <input type="password" name="password" id="password" required="">
                                                            </div>

                                                            {{-- Confirm Password --}}
                                                            <div class="form-group">
                                                                <label>Confirma Contraseña</label>
                                                                <input type="password" name="password_confirmation" id="password_confirmation" required="">
                                                            </div>

                                                            {{-- botón regístrate --}}
                                                            <div class="form-group message-btn">
                                                                <button type="submit" class="theme-btn btn-one">Regístrate</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ragister-section end -->

                        <ul class="info clearfix mr-0">
                            <li><i class="fab fa fa-envelope"></i><a
                                    href="mailto:bean@realshed.com">agent@gmail.com</a></li>
                            <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">03030571965</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- agent-details end -->

<!-- ragister-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title">
                    <h3>Inicia Sesión para Usuario</h3>
                </div>

                <div class="tabs-box">

                    {{-- Tabs Login y Register --}}
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Acceso</li>
                            <li class="tab-btn" data-tab="#tab-2"> Regístrate</li>
                        </ul>
                    </div>

                    <div class="tabs-content">

                        {{-- tab-1 Login --}}
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">

                                <h4>Inicia Sesión</h4>
                                <form action="{{ route('login') }}" method="post" class="default-form">
                                @csrf

                                    {{-- Nombre --}}
                                    <div class="form-group">
                                        <label>Nombre/Correo/Teléfono</label>
                                        <input type="text" name="login" id="login" required="">
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" id="password" required="">
                                    </div>

                                    {{-- botón Sign In --}}
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Iniciar</button>
                                    </div>

                                </form>
                                <div class="othre-text">
                                    <p>No tienes una cuenta? <a href="#">Da Click en pestaña de Regístrate</a></p>
                                </div>
                            </div>
                        </div>

                        {{-- tab-2 Regístrate --}}
                        <div class="tab" id="tab-2">
                            <div class="inner-box">
                                <h4>Registrarse</h4>

                                <form action="{{ route('register') }}" method="POST" class="default-form">
                                    @csrf

                                    {{-- Nombre --}}
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" id="name" required="">
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="email" name="email" id="email" required="">
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" id="password" required="">
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div class="form-group">
                                        <label>Confirma Contraseña</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" required="">
                                    </div>

                                    {{-- botón regístrate --}}
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Regístrate</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ragister-section end -->


<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Subscribe</span>
                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            <button type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->

@endsection
