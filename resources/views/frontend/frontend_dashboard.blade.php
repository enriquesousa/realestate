<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>@yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">

    {{-- Para soportar el csrf token en la función de JS, Ver al final, Añadir a Lista de Favoritos, add to wishlist --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

    {{-- Toaster cdn --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">

        <!-- preloader -->
        @if (Config::get('custom.display_preload'))
            @include('frontend.home.preload_inmuebles')
            {{-- @include('frontend.home.preload_fotos') --}}
        @endif

        <!-- main header -->
        @include('frontend.home.header')

        <!-- Mobile Menu  -->
        @include('frontend.home.mobile_menu')


        {{-- Sección principal --}}
        @yield('main')

        <!-- main-footer -->
        @include('frontend.home.footer')


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>

    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/map-helper.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    {{-- Toaster cdn --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Toaster script --}}
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
                switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            }
        @endif
    </script>

    {{-- Plugin for sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Añadir a Lista de Favoritos, add to wishlist --}}
    <script type="text/javascript">
        // Soportar el csrf token
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        // Función para añadir a lista de favoritos, viene de resources/views/frontend/home/feature.blade.php
        function addToWishList(property_id){

            $.ajax({

                type: "POST",
                dataType: 'json',
                url: "/add-to-wishList/"+property_id,

                // Si hay datos json data se llena de info, entonces manda un mensaje de éxito! (data.success)
                // O si hay error, también el toaster message despliega el mensaje de error. (data.error)
                success:function(data){

                    // Para que se refresque la pagina automático
                    wishlist();

                    // Start Toaster Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Toaster Message

                }

            })

        }

    </script>

    {{-- Load Wishlist Data and función para Remover --}}
    <script type="text/javascript">

        // Lista las Propiedades
        function wishlist(){

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-property/",

                success:function(response){

                    $('#wishQty').text(response.wishQty);

                    var rows = "";
                    var tipo = "";
                    $.each(response.wishlist, function(key,value){

                        if (value.property.featured == 1) {
                            tipo = "Popular";
                        }else{
                            tipo = "";
                        }

                        rows += `
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="/${value.property.property_thambnail}" alt="">
                                        </figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                        <span class="category">${tipo}</span>
                                        <div class="buy-btn"><a href="#">For ${value.property.property_status}</a></div>
                                    </div>
                                    <div class="lower-content">
                                        <div class="title-text">
                                            <h4><a href="#">${value.property.property_name}</a></h4>
                                        </div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Inicia desde</h6>
                                                <h4>$${value.property.lowest_price}</h4>
                                            </div>

                                        </div>

                                        <ul class="more-details clearfix">
                                            <li><i class="icon-14"></i>${value.property.bedrooms} Cuartos</li>
                                            <li><i class="icon-15"></i>${value.property.bathrooms} Baños</li>
                                            <li><i class="icon-16"></i>${value.property.property_size} m²</li>
                                        </ul>

                                        <div class="other-info-box clearfix">

                                            <ul class="other-option pull-right clearfix">
                                                <li><a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-trash"></i></a></li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            `
                    });

                    // Desplegar el contenido en la etiqueta id = wishlist
                    $('#wishlist').html(rows);

                }
            })

        }

        wishlist();

        // Wishlist Remove
        function wishlistRemove(id){

            $.ajax({

                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/"+id,

                success:function(data){

                    // Para que se refresque la pagina automático
                    wishlist();

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message

                }
            })
        }

    </script>

    {{-- Añadir a Comparar, onclick="addToCompare(this.id) viene de resources/views/frontend/home/feature.blade.php --}}
    <script type="text/javascript">

        // Función para comparar propiedad
        function addToCompare(property_id){

            $.ajax({

                type: "POST",
                dataType: 'json',
                url: "/add-to-compare/"+property_id,

                // Si hay datos json data se llena de info, entonces manda un mensaje de éxito! (data.success)
                // O si hay error, también el toaster message despliega el mensaje de error. (data.error)
                success:function(data){

                    // Start Toaster Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Toaster Message

                }

            })

        }

    </script>

    {{-- Load Compare Data, Funciones: compare()  --}}
    <script type="text/javascript">

        // Lista las Propiedades
        function compare(){

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-compare-property/",

                success:function(response){

                    var rows = "";
                    $.each(response, function(key,value){

                        rows += `

                            <tr>
                                <th>Property Info</th>
                                <th>
                                    <figure class="image-box"><img src="/${value.property.property_thambnail}" alt=""></figure>
                                    <div class="title">${value.property.property_name}</div>
                                    <div class="price">$${value.property.lowest_price}</div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <p>Ciudad</p>
                                </td>
                                <td>
                                    <p>${value.property.city}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Superficie</p>
                                </td>
                                <td>
                                    <p>${value.property.property_size} m²</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Cuartos</p>
                                </td>
                                <td>
                                    <p>${value.property.bedrooms}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Baños</p>
                                </td>
                                <td>
                                    <p>${value.property.bathrooms}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Acción</p>
                                </td>
                                <td>
                                    <a type="submit" class="text-body" id="${value.id}" onclick="compareRemove(this.id)" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        `
                    });

                    // Desplegar el contenido en la etiqueta id = compare
                    $('#compare').html(rows);

                }
            })

        }

        // para que auto refresque pagina
        compare();

        // Compare Remove
        function compareRemove(id){

            $.ajax({

                type: "GET",
                dataType: 'json',
                url: "/compare-remove/"+id,

                success:function(data){

                    // Para que se refresque la pagina automático
                    compare();

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message

                }
            })
        }

    </script>


</body>
<!-- End of .page_wrapper -->

</html>
