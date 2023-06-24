{{-- Llamado por: UserWishlist en app/Http/Controllers/Frontend/WishlistController.php --}}

@extends('frontend.frontend_dashboard')
@section('main')

<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Lista de Deseos</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Casa</a></li>
                <li>Lista de Deseos</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- property-page-section -->
<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">

            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">

                {{-- Recuperamos al user que esta login --}}
                @php
                    $id = Auth::user()->id;
                    $userData = App\Models\User::find($id);
                @endphp

                {{-- Titulo del Sidebar, Nombre y correo del User, Menu del sidebar --}}
                <div class="blog-sidebar">

                    {{-- Titulo del Sidebar y Nombre y correo del User --}}
                    <div class="sidebar-widget post-widget">

                        {{-- Titulo del Sidebar --}}
                        <div class="widget-title">
                            <h4>Perfil de Usuario</h4>
                        </div>

                        {{-- Nombre y correo del User --}}
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

                    {{-- Menu del sidebar --}}
                    <div class="sidebar-widget category-widget">

                        {{-- widget-title --}}
                        <div class="widget-title">
                            <h4></h4>
                        </div>

                        {{-- Menu del sidebar --}}
                        @include('frontend.dashboard.dashboard_sidebar')

                    </div>

                </div>

            </div>

            {{-- Contenido, aquí ponemos la lista de <propiedades></propiedades> --}}
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">

                    <div class="wrapper list">

                        <div class="deals-list-content list-item">

                            {{-- Datos de una sola propiedad --}}
                            {{-- Lo pasamos a resources/views/frontend/frontend_dashboard.blade.php --}}
                            {{-- Para que lo maneje ajax con JS --}}
                            <div id="wishlist">

                            </div>


                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- property-page-section end -->


<!-- subscribe-section -->
@include('frontend.home.subscribe')


@endsection
