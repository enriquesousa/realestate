@extends('frontend.frontend_dashboard')
@section('main')

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


<!-- ragister-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title">
                    <h3>Inicia Sesión para Agente</h3>
                </div>
                <div class="tabs-box">

                    {{-- Tabs Login y Register --}}
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Acceso Agente</li>
                            <li class="tab-btn" data-tab="#tab-2"> Registro Agente</li>
                        </ul>
                    </div>

                    <div class="tabs-content">

                        {{-- tab-1 Login --}}
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">

                                @php
                                    Config::set('custom.display_preload', false)
                                @endphp

                                <h4>Inicia Sesión Agente</h4>

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

                                    {{-- boton Sign In --}}
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
                                <h4>Registro de Agente</h4>

                                <form action="{{ route('agent.register') }}" method="POST" class="default-form">
                                @csrf

                                    {{-- Nombre --}}
                                    <div class="form-group">
                                        <label>Nombre Agente</label>
                                        <input type="text" name="name" id="name" required="">
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="email" name="email" id="email" required="">
                                    </div>

                                    {{-- Phone --}}
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="phone" id="phone" required="">
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" id="password" required="">
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
