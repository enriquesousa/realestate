@extends('frontend.frontend_dashboard')
@section('main')

<!--Page Title-->
<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Perfil de Usuario</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Perfil de Usuario<li>
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

            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">

                <div class="blog-sidebar">

                    {{-- Datos de Perfil de Usuario --}}
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title">
                            <h4>Perfil de Usuario</h4>
                        </div>

                        <div class="post-inner">
                            <div class="post">
                                <figure class="post-thumb"><a href="blog-details.html">
                                <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt=""></a></figure>
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


            <div class="col-lg-8 col-md-12 col-sm-12 content-side">

                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">

                            <div class="lower-content">

                                <form action="signin.html" method="post" class="default-form">

                                    {{-- Username --}}
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="{{ $userData->username }}">
                                    </div>

                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" value="{{ $userData->name }}">
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="email" name="email" value="{{ $userData->email }}">
                                    </div>

                                    {{-- Phone --}}
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="phone" value="{{ $userData->phone }}">
                                    </div>

                                    {{-- Address --}}
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" name="address" value="{{ $userData->address }}">
                                    </div>

                                    {{-- Imagen --}}
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" name="photo" type="file" id="formFile">
                                    </div>


                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Save Changes</button>
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
<!-- sidebar-page-container -->

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
