{{--
    Sección del frontend
    "Propiedades Populares"
    LLamado de: resources/views/frontend/index.blade.php
--}}

@php
    $property = App\Models\Property::where('status','1')->where('featured','1')->limit(3)->get();
@endphp


<!-- feature-section Sección de Propiedades Populares -->
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            {{-- <h5>Features</h5> --}}
            <h5>Populares</h5>
            <h2>Propiedades Populares</h2>
            <p>A continuación listamos las propiedades mas populares, debido a su buena ubicación e insuperables precios, esperemos que sean de su agrado.<br/>Nuestras propiedades siempre están respaldadas por nuestra garantía de entera satisfacción de nuestros clientes.</p>
        </div>
        <div class="row clearfix">

        @foreach ($property as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">

                        {{-- Caja de la Imagen --}}
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset($item->property_thambnail) }}" alt="">
                            </figure>
                            <div class="batch"><i class="icon-11"></i></div>
                            <span class="category">Popular</span>
                        </div>

                        {{-- lower-content --}}
                        <div class="lower-content">

                            {{-- Agent Name, Photo and property_status for (rent or buy) --}}
                            <div class="author-info clearfix">
                                <div class="author pull-left">

                                    @if ($item->agent_id == Null)
                                        <figure class="author-thumb"><img src="{{ url('upload/admin.png') }}" alt=""></figure>
                                        <h6>Admin</h6>
                                    @else
                                        <figure class="author-thumb"><img src="{{ (!empty($item->user->photo)) ? url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                        <h6>{{ $item->user->name }}</h6>
                                    @endif

                                </div>
                                <div class="buy-btn pull-right"><a href="property-details.html">For {{ $item->property_status }}</a>
                                </div>
                            </div>

                            {{-- Nombre de la Propiedad --}}
                            <div class="title-text">
                                <h4><a href="{{ url('property/details/'.$item->id.'/'.$item->property_slug) }}">{{ $item->property_name }}</a></h4>
                            </div>

                            {{-- lowest_price y botones de comparar y favorito--}}
                            <div class="price-box clearfix">

                                {{-- Precio mas bajo --}}
                                <div class="price-info pull-left">
                                    <h6>Inicia desde</h6>
                                    <h4>$ {{ $item->lowest_price }}</h4>
                                </div>

                                {{-- botones de comparar y favorito --}}
                                <ul class="other-option pull-right clearfix">

                                    {{-- botón comprar propiedades --}}
                                    <li><a aria-label="Comparar" class="action-btn" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>

                                    {{-- botón añadir a favoritos --}}
                                    <li><a aria-label="Añadir a Deseo" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>

                                </ul>

                            </div>

                            {{-- short_descp --}}
                            <p>{{ $item->short_descp }}</p>

                            {{-- bedrooms, bathrooms, property_size --}}
                            <ul class="more-details clearfix">
                                <li><i class="icon-14"></i>{{ $item->bedrooms }} Cuartos</li>
                                <li><i class="icon-15"></i>{{ $item->bathrooms }} Baños</li>
                                <li><i class="icon-16"></i>{{ $item->property_size }} m²</li>
                            </ul>

                            {{-- botón ver detalles --}}
                            <div class="btn-box">
                                <a href="{{ url('property/details/'.$item->id.'/'.$item->property_slug) }}" class="theme-btn btn-two">Ver Detalles</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        </div>
        <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All
                Listing</a></div>
    </div>
</section>
<!-- feature-section end -->
