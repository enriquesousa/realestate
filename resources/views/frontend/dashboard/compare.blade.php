@extends('frontend.frontend_dashboard')
@section('main')

{{-- Para no cargar el preload --}}
@php
    Config::set('custom.display_preload', false)
@endphp

<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});">
        </div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});">
        </div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Comparar Propiedades</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Inicio</a></li>
                <li>Comparar Propiedades</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- properties-section Esto es con JS id="compare" -->
{{-- <section class="properties-section centred">
    <div class="auto-container">
        <div class="table-outer">
            <table class="properties-table">

                <tbody id="compare">


                </tbody>

            </table>
        </div>
    </div>
</section> --}}
<!-- properties-section end -->

@if ($compare->isEmpty())

<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});">
        </div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});">
        </div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h3 class="" style="color: red; font-weight: semi-bold;">No hay propiedades para comparar</h3>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('dashboard') }}">Regresar al panel de control</a></li>
            </ul>
        </div>
    </div>
</section>

@else

<!-- properties-section sin JS! -->
<section class="properties-section centred">
    <div class="auto-container">
        <div class="table-outer">
            <table class="properties-table">

                <thead class="table-header">

                    <tr>
                        <th>Información Propiedad</th>



                        @foreach ($compare as $item)

                            <th>
                                <figure class="image-box">
                                    <img src="{{ asset($item->property->property_thambnail) }}" alt="">
                                </figure>

                                <div class="title">{{ $item->property->property_name }}</div>
                                <div class="price">$ @convert($item->property->lowest_price)</div>

                                <a href="{{ route('compare.delete', $item->id) }}" class="batch" style="color: red;" title="Eliminar de la Comparación"><i class="fas fa-trash-alt"></i></a>
                            </th>

                        @endforeach

                    </tr>

                </thead>

                <tbody>

                    {{-- Ciudad --}}
                    <tr>

                        <td>
                            <p>Ciudad</p>
                        </td>

                        @foreach ($compare as $item)
                            <td>
                                <p>{{ $item->property->city }}</p>
                            </td>
                        @endforeach

                    </tr>

                    {{-- Area --}}
                    <tr>

                        <td>
                            <p>Area</p>
                        </td>

                        @foreach ($compare as $item)
                            <td>
                                <p>{{ $item->property->property_size }} m²</p>
                            </td>
                        @endforeach

                    </tr>

                    {{-- Cuartos --}}
                    <tr>

                        <td>
                            <p>Dormitorios</p>
                        </td>

                        @foreach ($compare as $item)
                            <td>
                                <p>{{ $item->property->bedrooms }}</p>
                            </td>
                        @endforeach

                    </tr>

                    {{-- Baños --}}
                    <tr>

                        <td>
                            <p>Baños</p>
                        </td>

                        @foreach ($compare as $item)
                            <td>
                                <p>{{ $item->property->bathrooms }}</p>
                            </td>
                        @endforeach

                    </tr>

                    {{-- Cochera --}}
                    <tr>

                        <td>
                            <p>Cochera</p>
                        </td>

                        @foreach ($compare as $item)
                            <td>
                                <p>{{ $item->property->garage }}</p>
                            </td>
                        @endforeach

                    </tr>

                    {{-- Dimensiones Cochera --}}
                    <tr>

                        <td>
                            <p>Dimensiones Cochera</p>
                        </td>

                        @foreach ($compare as $item)
                            <td>
                                <p>{{ $item->property->garage_size }} m²</p>
                            </td>
                        @endforeach

                    </tr>


                    {{-- Comodidad - Aire Acondicionado --}}
                    <tr>

                        <td>
                            <p>Aire Acondicionado</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Aire Acondicionado') === FALSE)
                                <p><i class="no fas fa-times"></i></p>
                            @else
                                <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Servicio de Limpieza --}}
                    <tr>

                        <td>
                            <p>Servicio de Limpieza</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Servicio de Limpieza') === FALSE)
                                <p><i class="no fas fa-times"></i></p>
                            @else
                                <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Lavadora --}}
                    <tr>

                        <td>
                            <p>Lavadora</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Lavadora') === FALSE)
                                <p><i class="no fas fa-times"></i></p>
                            @else
                                <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Secadora --}}
                    <tr>

                        <td>
                            <p>Secadora</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Secadora') === FALSE)
                                <p><i class="no fas fa-times"></i></p>
                            @else
                                <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Pisos de Madera --}}
                    <tr>

                        <td>
                            <p>Pisos de Madera</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Pisos de Madera') === FALSE)
                                <p><i class="no fas fa-times"></i></p>
                            @else
                                <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Alberca --}}
                    <tr>

                        <td>
                            <p>Alberca</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Alberca') === FALSE)
                                <p><i class="no fas fa-times"></i></p>
                            @else
                                <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Regadera externa --}}
                    <tr>

                        <td>
                            <p>Regadera externa</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Regadera externa') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Microondas --}}
                    <tr>

                        <td>
                            <p>Microondas</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Microondas') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Refrigerador --}}
                    <tr>

                        <td>
                            <p>Refrigerador</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Refrigerador') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Estufa --}}
                    <tr>

                        <td>
                            <p>Estufa</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Estufa') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Admite Mascotas --}}
                    <tr>

                        <td>
                            <p>Admite Mascotas</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Admite Mascotas') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Cancha de Basket Ball --}}
                    <tr>

                        <td>
                            <p>Cancha de Basket Ball</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Cancha de Basket Ball') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Cancha de Tenis --}}
                    <tr>

                        <td>
                            <p>Cancha de Tenis</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Cancha de Tenis') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>

                    {{-- Comodidad - Gimnasio --}}
                    <tr>

                        <td>
                            <p>Gimnasio</p>
                        </td>

                        @foreach ($compare as $item)
                        <td>
                            @if (strstr($item->property->amenities_id, 'Gimnasio') === FALSE)
                            <p><i class="no fas fa-times"></i></p>
                            @else
                            <p><i class="yes fas fa-check"></i></p>
                            @endif
                        </td>
                        @endforeach

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- properties-section end -->

@endif





<!-- subscribe-section -->
@include('frontend.home.subscribe')


@endsection
