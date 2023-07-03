@extends('frontend.frontend_dashboard')
@section('main')

{{-- From: PropertyDetails app/Http/Controllers/Frontend/IndexController.php --}}

<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Detalles de la Propiedad</h1>
            <ul class="bread-crumb clearfix">
                {{-- <li><a href="index.html">Home</a></li> --}}
                <li>{{ $property->property_name }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- property-details -->
<section class="property-details property-details-one">
    <div class="auto-container">

        {{-- top-details, Titulo de la Propiedad y Agente mas estrellas mas estatus, compra o renta --}}
        <div class="top-details clearfix">

            {{-- Titulo de la Propiedad y Agente mas estrellas de calificación --}}
            <div class="left-column pull-left clearfix">
                <h3>{{ $property->property_name }}</h3>
                <div class="author-info clearfix">
                    <div class="author-box pull-left">

                        @if ($property->agent_id == Null)
                            <figure class="author-thumb"><img src="{{ url('upload/admin.png') }}" alt=""></figure>
                            <h6>Admin</h6>
                        @else
                            <figure class="author-thumb"><img src="{{ (!empty($property->user->photo)) ? url('upload/agent_images/'.$property->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                            <h6>{{ $property->user->name }}</h6>
                        @endif

                    </div>
                    <ul class="rating clearfix pull-left">
                        <li><i class="icon-39"></i></li>
                        <li><i class="icon-39"></i></li>
                        <li><i class="icon-39"></i></li>
                        <li><i class="icon-39"></i></li>
                        <li><i class="icon-40"></i></li>
                    </ul>
                </div>
            </div>

            {{-- Estatus, para renta o compra y precio --}}
            <div class="right-column pull-right clearfix">
                <div class="price-inner clearfix">
                    <ul class="category clearfix pull-left">
                        <li><a href="property-details.html">{{ $property->type->type_name }}</a></li>
                        <li><a href="property-details.html">Para {{ $property->property_status }}</a></li>
                    </ul>
                    <div class="price-box pull-right">
                        <h3>$ @convert($property->lowest_price)</h3>
                    </div>
                </div>
                <ul class="other-option pull-right clearfix">
                    <li><a href="property-details.html"><i class="icon-37"></i></a></li>
                    <li><a href="property-details.html"><i class="icon-38"></i></a></li>
                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                </ul>
            </div>

        </div>

        {{-- Multiples Características de la Propiedad --}}
        <div class="row clearfix">

            {{-- property-details-content --}}
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-details-content">

                    {{-- Display Multi Images en Carousel --}}
                    <div class="carousel-inner">
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                            @foreach ($multiImage as $image)
                                <figure class="image-box"><img src="{{ asset($image->photo_name) }}" alt=""></figure>
                            @endforeach
                        </div>
                    </div>

                    {{-- Property Description --}}
                    <div class="discription-box content-widget">
                        <div class="title-box">
                            <h4>Descripción</h4>
                        </div>
                        <div class="text">
                            <p>{!! $property->long_descp !!}</p>
                        </div>
                    </div>

                    {{-- Property Details, ID, Rooms, Garage etc... --}}
                    <div class="details-box content-widget">
                        <div class="title-box">
                            <h4>Detalles de la Propiedad</h4>
                        </div>
                        <ul class="list clearfix">
                            <li>Property ID: <span>{{ $property->property_code }}</span></li>
                            <li>Cuartos: <span>{{ $property->bedrooms }}</span></li>
                            <li>Tamaño Cochera: <span>{{ $property->garage_size }} m²</span></li>
                            <li>Tipo: <span>{{ $property->type->type_name }}</span></li>
                            <li>Baños: <span>{{ $property->bathrooms }}</span></li>
                            <li>Estatus: <span>Para {{ $property->property_status }}</span></li>
                            <li>Dimensiones: <span>{{ $property->property_size }} m²</span></li>
                            <li>Cocheras: <span>{{ $property->garage }}</span></li>
                        </ul>
                    </div>

                    {{-- Amenities --}}
                    <div class="amenities-box content-widget">
                        <div class="title-box">
                            <h4>Amenities</h4>
                        </div>
                        <ul class="list clearfix">
                            @foreach ($property_amenities as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>


                    {{-- Location google-map-area --}}
                    <div class="location-box content-widget">
                        <div class="title-box">
                            <h4>Ubicación</h4>
                        </div>

                        {{-- Dirección --}}
                        <ul class="info clearfix">
                            <li><span>Dirección: </span>{{ $property->address }}</li>
                            <li><span>Estado: </span>{{ $property['r_estado']['state_name'] }}</li>
                            <li><span>Vecindario: </span>{{ $property->neighborhood }}</li>
                            <li><span>Código Postal: </span>{{ $property->postal_code }}</li>
                            <li><span>Ciudad: </span>{{ $property->city }}</li>
                        </ul>

                        {{-- google-map-area --}}
                        <div class="google-map-area">
                            <div class="google-map" id="contact-google-map"
                                data-map-lat="{{ $property->latitude }}"
                                data-map-lng="{{ $property->longitude }}"
                                data-icon-path="{{ asset('frontend/assets/images/icons/map-marker.png') }}"
                                data-map-title="Iglesia Estrella del Mar, Playas de Tijuana" data-map-zoom="12"
                                data-markers='{
                                    "marker-1":
                                    [32.524690, -117.120030,
                                    "<h4>Iglesia Estrella del Mar</h4><p>Playas de Tijuana</p>",
                                    "{{ asset('frontend/assets/images/icons/map-marker.png') }}"]
                                }'>
                            </div>

                            {{-- Botón Ver en Google Maps con Latitude y Longitude--}}
                            <div class="btn-box m-2" >
                                <a href="{{ url('/google/maps/'.$property->latitude.'/'.$property->longitude) }}" class="theme-btn btn-two" target="_blank">Ver en Google Maps</a>
                            </div>

                            <br>

                            @if ($property->google_map !== Null)
                                {{-- link con iframe --}}
                                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3363.962744026947!2d-117.11778768482424!3d32.52714198104826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDMxJzM3LjciTiAxMTfCsDA2JzU2LjIiVw!5e0!3m2!1ses-419!2smx!4v1686880226544!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @endif

                            {{-- <form action="{{ route('google.map') }}" method="POST" id="miForma">
                            @csrf
                                <input type="hidden" name="latitude" value="{{ $property->latitude }}">
                                <input type="hidden" name="longitude" value="{{ $property->longitude }}">
                                <input type="hidden" name="google_map" value="{{ $property->google_map }}">

                                <button type="submit" class="btn btn-primary">Ver en Google Map</button> --}}

                                {{-- Si lo quiero ver con Botón con estilo de la plantilla --}}
                                {{-- <div class="btn-box m-2" >
                                    <a href="#" target="_blank" onclick="document.getElementById('miForma').submit()" class="theme-btn btn-two">Ver en Google Maps</a>
                                </div> --}}
                            {{-- </form> --}}

                        </div>
                    </div>

                    {{-- Que hay cerca? --}}
                    <div class="nearby-box content-widget">
                        <div class="title-box">
                            <h4>Que hay cerca?</h4>
                        </div>
                        <div class="inner-box">

                            {{-- Lugares --}}
                            <div class="single-item">
                                <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                <div class="inner">

                                    <h5>Lugares:</h5>

                                    @foreach ($facility as $item)
                                    <div class="box clearfix">
                                        <div class="text pull-left">
                                            <h6>{{ $item->facility_name }} <span>({{ $item->distance }} km)</span></h6>
                                        </div>
                                        {{-- calificación con 5 estrellas --}}
                                        <ul class="rating pull-right clearfix">
                                            <li><i class="icon-39"></i></li>
                                            <li><i class="icon-39"></i></li>
                                            <li><i class="icon-39"></i></li>
                                            <li><i class="icon-39"></i></li>
                                            <li><i class="icon-40"></i></li>
                                        </ul>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Video Link --}}
                    <div class="statistics-box content-widget">
                        <div class="title-box">
                            <h4>Video</h4>
                        </div>

                        @if (filter_var($property->property_video, FILTER_VALIDATE_URL))
                            <figure class="image-box">
                                <iframe width="700" height="415" src="{{ $property->property_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </figure>
                        @else
                            <figure class="image-box">
                                <iframe width="700" height="415" src="https://www.youtube.com/embed/05DqIGS_koU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </figure>
                        @endif
                    </div>

                    {{-- Schedule A Tour --}}
                    <div class="schedule-box content-widget">
                        <div class="title-box">
                            <h4>Schedule A Tour</h4>
                        </div>
                        <div class="form-inner">
                            <form action="property-details.html" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <i class="far fa-calendar-alt"></i>
                                            <input type="text" name="date" placeholder="Tour Date"
                                                id="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <i class="far fa-clock"></i>
                                            <input type="text" name="time" placeholder="Any Time">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <input type="tel" name="phone" placeholder="Your Phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Datos del Agente - sidebar-side a la derecha --}}
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="property-sidebar default-sidebar">

                    {{-- Datos del Agente, author-widget sidebar-widget --}}
                    <div class="author-widget sidebar-widget">

                        {{-- Caja del Agente, Nombre, Dirección, Teléfono --}}
                        <div class="author-box">

                            @if ($property->agent_id == Null)
                                <figure class="author-thumb"><img src="{{ url('upload/admin.png') }}" alt="">
                                </figure>
                                <div class="inner">
                                    <h4>Admin</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>Dirección de Admin Estática</li>
                                        <li><i class="fas fa-phone"></i><a href="tel:03030571965">030 3057 1965 (Estático)</a></li>
                                    </ul>
                                    <div class="btn-box"><a href="agents-details.html">Lista de Propiedades</a></div>
                                </div>
                            @else
                                <figure class="author-thumb"><img src="{{ (!empty($property->user->photo)) ? url('upload/agent_images/'.$property->user->photo) : url('upload/no_image.jpg') }}" alt="">
                                </figure>
                                <div class="inner">
                                    <h4>{{ $property->user->name }}</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $property->user->address }}</li>
                                        <li><i class="fas fa-phone"></i><a href="tel:{{ $property->user->phone }}">{{ $property->user->phone }}</a></li>
                                    </ul>
                                    <div class="btn-box"><a href="agents-details.html">Lista de Propiedades</a></div>
                                </div>
                            @endif

                        </div>

                        {{-- Nombre, Correo, Teléfono, Mensaje, Botón Enviar Mensaje --}}
                        <div class="form-inner">

                            {{-- Si el usuario esta login, despliega sus datos en la forma--}}
                            @auth

                                {{-- Get los datos del user que esta login --}}
                                @php
                                    $id = Auth::user()->id;
                                    $userData = App\Models\User::find($id);
                                @endphp

                                <form action="{{ route('property.message') }}" method="post" class="default-form">
                                @csrf

                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                    @if ($property->agent_id == Null)
                                        <input type="hidden" name="agent_id" value="">
                                    @else
                                        <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                    @endif

                                    <div class="form-group">
                                        <input type="text" name="msg_name" placeholder="Your name" value="{{ $userData->name }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="msg_email" placeholder="Your Email" value="{{ $userData->email }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="msg_phone" placeholder="Phone" value="{{ $userData->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Mandar Mensaje</button>
                                    </div>

                                </form>

                            @else

                                <form action="{{ route('property.message') }}" method="post" class="default-form">
                                @csrf

                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                    @if ($property->agent_id == Null)
                                        <input type="hidden" name="agent_id" value="">
                                    @else
                                        <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                    @endif

                                    <div class="form-group">
                                        <input type="text" name="msg_name" placeholder="Your name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="msg_email" placeholder="Your Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="msg_phone" placeholder="Phone" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Mandar Mensaje</button>
                                    </div>

                                </form>

                            @endauth

                        </div>

                    </div>

                    {{-- Calculadora de Costos - calculator-widget sidebar-widget --}}
                    <div class="calculator-widget sidebar-widget">
                        <div class="calculate-inner">
                            <div class="widget-title">
                                <h4>Mortgage Calculator</h4>
                            </div>
                            <form method="post" action="mortgage-calculator.html" class="default-form">
                                <div class="form-group">
                                    <i class="fas fa-dollar-sign"></i>
                                    <input type="number" name="total_amount" placeholder="Total Amount">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-dollar-sign"></i>
                                    <input type="number" name="down_payment" placeholder="Down Payment">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-percent"></i>
                                    <input type="number" name="interest_rate" placeholder="Interest Rate">
                                </div>
                                <div class="form-group">
                                    <i class="far fa-calendar-alt"></i>
                                    <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Monthly">Monthly</option>
                                            <option value="1">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Propiedades Similares --}}
        <div class="similar-content">

            {{-- Titulo --}}
            <div class="title">
                <h4>Propiedades Similares</h4>
            </div>

            <div class="row clearfix">

                {{-- Card --}}
                @foreach ($relatedProperty as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">

                            {{-- image-box --}}
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset($item->property_thambnail) }}" alt="">
                                </figure>
                                <div class="batch"><i class="icon-11"></i></div>
                                {{-- <span class="category">Popular</span> --}}
                                <span class="category">{{ $property->type->type_name }}</span>
                            </div>

                            {{-- lower-content --}}
                            <div class="lower-content">

                                {{-- Agente Nombre, --}}
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

                                    <div class="buy-btn pull-right">
                                        {{-- <ul class="category clearfix pull-left">
                                            <li><a href="property-details.html">{{ $item->type->type_name }}</a></li>
                                            <li><a href="property-details.html">Para {{ $item->property_status }}</a></li>
                                        </ul> --}}
                                        <a href="property-details.html">Para {{ $item->property_status }}</a>
                                    </div>

                                </div>

                                {{-- Nombre de la Propiedad --}}
                                <div class="title-text">
                                    <h4><a href="{{ url('property/details/'.$item->id.'/'.$item->property_slug) }}">{{ $item->property_name }}</a></h4>
                                </div>

                                {{-- Información del Precio --}}
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>Inicia desde</h6>
                                        <h4>$ {{ $item->lowest_price }}</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                        <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>

                                {{-- Descripción Corta --}}
                                <p>{{ $item->short_descp }}</p>

                                {{-- Detalles Cuartos, Baños y Dimensiones --}}
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
        </div>

    </div>
</section>
<!-- property-details end -->

<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Suscribirse</span>
                    <h2>Suscribirse a nuestro boletín para recibir las últimas noticias y ofertas.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            <button type="submit">Suscribirse ahora</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->


@endsection
