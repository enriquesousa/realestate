{{-- LLamado por: resources/views/frontend/index.blade.php --}}

@php

    $states = App\Models\State::latest()->get();
    $ptypes = App\Models\PropertyType::latest()->get();

@endphp

{{-- Banner para fotos oficiales:  asset('frontend/assets/images/banner/banner-fo.jpg') --}}
{{-- Banner para Inmuebles:  asset('frontend/assets/images/banner/banner-1.jpg') --}}
<!-- banner-section -->
<section class="banner-section" style="background-image: url({{ asset('frontend/assets/images/banner/banner-1.jpg') }});">
    <div class="auto-container">
        <div class="inner-container">

            <div class="content-box centred">
                <h2>Cree riqueza duradera</h2>
                <p>Amet consectetur adipisicing elit sed do eiusmod.</p>
            </div>

            <div class="search-field">
                <div class="tabs-box">

                    {{-- Titulo de los Tabs --}}
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">COMPRAR</li>
                            <li class="tab-btn" data-tab="#tab-2">RENTAR</li>
                        </ul>
                    </div>

                    <div class="tabs-content info-group">

                        {{-- Tab-1 COMPRA --}}
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <div class="top-search">

                                    <form action="{{ route('buy.property.search') }}" method="post" class="search-form">
                                    @csrf

                                        <div class="row clearfix">

                                            {{-- Search Property input field --}}
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Buscar Propiedad</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="search" placeholder="Buscar por nombre, ubicación o tipo ..." required="">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Location --}}
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Ubicación</label>
                                                    <div class="select-box">
                                                        <i class="far fa-compass"></i>
                                                        <select name="state" class="wide">
                                                            <option data-display="Entre Ubicación"></option>
                                                            @foreach ($states as $item)
                                                                <option value="{{ $item->state_name }}">{{ $item->state_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Property Type --}}
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Tipo de Propiedad</label>
                                                    <div class="select-box">
                                                        <select name="ptype_id" class="wide">
                                                            <option data-display="Todos los Tipos"></option>
                                                            @foreach ($ptypes as $item)
                                                                <option value="{{ $item->type_name }}">{{ $item->type_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Buscar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        {{-- Tab-2 RENTA --}}
                        <div class="tab" id="tab-2">
                            <div class="inner-box">
                                <div class="top-search">

                                    <form action="{{ route('rent.property.search') }}" method="post" class="search-form">
                                        @csrf

                                        <div class="row clearfix">

                                            {{-- Search Property input field --}}
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Buscar Propiedad</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="search" placeholder="Buscar por nombre, ubicación o tipo ..."
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Location --}}
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Ubicación</label>
                                                    <div class="select-box">
                                                        <i class="far fa-compass"></i>
                                                        <select name="state" class="wide">
                                                            <option data-display="Entre Ubicación"></option>
                                                            @foreach ($states as $item)
                                                            <option value="{{ $item->state_name }}">{{ $item->state_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Property Type --}}
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Tipo de Propiedad</label>
                                                    <div class="select-box">
                                                        <select name="ptype_id" class="wide">
                                                            <option data-display="Todos los Tipos"></option>
                                                            @foreach ($ptypes as $item)
                                                            <option value="{{ $item->type_name }}">{{ $item->type_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Buscar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->
