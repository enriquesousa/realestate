@extends('frontend.frontend_dashboard')
@section('main')


<!--Page Title-->
<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Chat en Vivo</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Chat en Vivo<li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">

            @php
                // Recuperamos al user que esta login
                $id = Auth::user()->id;
                $userData = App\Models\User::find($id);
            @endphp

            {{-- sidebar --}}
            <div class="col-lg-3 col-md-3 col-sm-3 sidebar-side">
                <div class="blog-sidebar">

                    {{-- Datos de Perfil de Usuario --}}
                    <div class="sidebar-widget post-widget">

                        <div class="widget-title">
                            <h4>Cambiar Contraseña</h4>
                        </div>

                        <div class="post-inner">
                            <div class="post">
                                <figure class="post-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt="">
                                    </a>
                                </figure>
                                <h5><a href="blog-details.html">{{ $userData->name }}</a></h5>
                                <p>{{ $userData->email }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="sidebar-widget category-widget">

                        {{-- Titulo del menu del sidebar --}}
                        <div class="widget-title">

                        </div>

                        {{-- Menu del sidebar --}}
                        @include('frontend.dashboard.dashboard_sidebar')

                    </div>

                </div>
            </div>

            {{-- content-side aquí ponemos el formulario para cambiar contraseña --}}
            <div class="col-lg-9 col-md-9 col-sm-9 content-side">

                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="lower-content">

                                <h3>Caja de Mensajes en Vivo</h3>

                                {{-- Desplegar componente de vue --}}
                                <div id="app">
                                    <chat-message></chat-message>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>

            </div>


        </div>
    </div>
</section>
<!-- sidebar-page-container -->

<!-- subscribe-section -->
@include('frontend.home.subscribe')


@endsection
