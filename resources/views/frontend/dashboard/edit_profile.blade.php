@extends('frontend.frontend_dashboard')
@section('main')

{{-- Funcionalidad con la imagen --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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


            <div class="col-lg-8 col-md-12 col-sm-12 content-side">

                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">

                            <div class="lower-content">

                                <form method="POST" action="{{ route('user.profile.store') }}" class="default-form" enctype="multipart/form-data">
                                @csrf

                                    {{-- Username --}}
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $userData->username }}">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" value="{{ $userData->name }}">
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $userData->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

                                    {{-- Seleccionar Imagen --}}
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>

                                    {{-- Display Imagen --}}
                                    <div class="form-group">
                                        <label for="formFile" class="form-label"></label>
                                        <img id="showImage" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px;">
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

{{-- Funcionalidad con la imagen --}}
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

{{-- Format phone number --}}
<script type="text/javascript">
    // Format phone number
    // https://stackoverflow.com/questions/17980061/how-to-change-phone-number-format-in-input-as-you-type
    $("input[name='phone']").keyup(function() {
        // $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d{2})(\d+)$/, "($1) $2-$3-$4"));
        $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d{4})$/, "($1) $2-$3"));
    });
</script>

@endsection
