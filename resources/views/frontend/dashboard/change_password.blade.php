@extends('frontend.frontend_dashboard')
@section('main')


<!--Page Title-->
<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Cambiar Contraseña</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Cambiar Contraseña<li>
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
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">

                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">

                            <div class="lower-content">

                                <form method="POST" action="{{ route('user.password.update') }}" class="default-form" enctype="multipart/form-data">
                                @csrf


                                    {{-- Old Password --}}
                                    <div class="form-group">
                                        <label>Contraseña Vieja</label>
                                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- New Password --}}
                                    <div class="form-group">
                                        <label>Contraseña Nueva</label>
                                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Confirm New Password --}}
                                    <div class="form-group">
                                        <label>Confirmar Contraseña Nueva</label>
                                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
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
@include('frontend.home.subscribe')


@endsection
