@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper datos para editar con el total del ancho 12 columnas -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('Edit Property') }}</h6>

                        <form method="POST" action="{{ route('update.property') }}" id="myForm" enctype="multipart/form-data">
                        @csrf

                            {{-- Para capturar el id del record que queremos editar --}}
                            <input type="hidden" name="id" value="{{ $property->id }}">

                            {{-- Row 1, Seleccionar Estatus, Precio mas Bajo, Precio mas Alto, Imagen Miniatura, Imágenes Multiples --}}
                            <div class="row">

                                {{-- Nombre Propiedad --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Nombre</label>
                                        <input type="text" name="property_name" class="form-control" value="{{ $property->property_name }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Status --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Estatus</label>
                                        <select name="property_status" class="form-select"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Estatus</option>
                                            <option value="renta" {{ $property->property_status == 'renta' ? 'selected' : '' }}>Para Renta</option>
                                            <option value="compra" {{ $property->property_status == 'compra' ? 'selected' : '' }}>Para Compra</option>
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Lowest Price --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Precio mas Bajo</label>
                                        <input type="text" name="lowest_price" class="form-control" value="{{ $property->lowest_price }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Max Price --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Precio mas Alto</label>
                                        <input type="text" name="max_price" class="form-control" value="{{ $property->max_price }}">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 2, Dormitorios, Baños, Cochera, Tamaño Cochera --}}
                            <div class="row">

                                {{-- BedRooms --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Dormitorios</label>
                                        <input type="text" name="bedrooms" class="form-control" value="{{ $property->bedrooms }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Bathrooms --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Baños</label>
                                        <input type="text" name="bathrooms" class="form-control" value="{{ $property->bathrooms }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Garage --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Cochera</label>
                                        <input type="text" name="garage" class="form-control" value="{{ $property->garage }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Garage Size --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Tamaño de Cochera (m²)</label>
                                        <input type="text" name="garage_size" class="form-control" value="{{ $property->garage_size }}">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 3, Dirección, Ciudad, Estado --}}
                            <div class="row">

                                {{-- Address --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Dirección</label>
                                        <input type="text" name="address" class="form-control" value="{{ $property->address }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- City --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Ciudad</label>
                                        <input type="text" name="city" class="form-control" value="{{ $property->city }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- State --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Estado</label>
                                        <select name="state" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Estado</option>
                                            @foreach($estado as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $property->state ? 'selected' : '' }}>{{ $item->state_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Postal Code --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Código Postal</label>
                                        <input type="text" name="postal_code" class="form-control" value="{{ $property->postal_code }}">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 4, Tamaño Propiedad, Video, Vecindario --}}
                            <div class="row">

                                {{-- Property Size --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Tamaño Propiedad (m²)</label>
                                        <input type="text" name="property_size"  class="form-control" value="{{ $property->property_size }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Video --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Video Propiedad</label>
                                        <input type="text" name="property_video"  class="form-control" value="{{ $property->property_video }}">
                                    </div>
                                </div><!-- Col -->

                                {{-- Neighborhood --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Vecindario</label>
                                         <input type="text" name="neighborhood"  class="form-control" value="{{ $property->neighborhood }}">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 5, Latitud, Longitud, link google map --}}
                            <div class="row">

                                {{-- Latitude --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Latitud</label>
                                        <input type="text" name="latitude" class="form-control" value="{{ $property->latitude }}">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Ve aquí para saber la latitud de una dirección</a>
                                    </div>
                                </div><!-- Col -->

                                {{-- Longitude --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Longitud</label>
                                        <input type="text" name="longitude" class="form-control" value="{{ $property->longitude }}">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Ve aquí para saber la latitud de una dirección</a>
                                    </div>
                                </div><!-- Col -->

                                {{-- Google Map Link --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Liga a Google Map</label>
                                        <input type="text" name="google_map" class="form-control" value="{{ $property->google_map }}">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 6, Tipo de Propiedad, Comodidades, Agente --}}
                            <div class="row">

                                {{-- Property Type --}}
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Tipo de Propiedad</label>
                                        <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Tipo</option>
                                            @foreach($propertytype as $ptype)
                                                <option value="{{ $ptype->id }}" {{ $ptype->id == $property->ptype_id ? 'selected' : '' }}>{{ $ptype->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Amenities --}}
                                <div class="col-sm-4">
                                    <label class="form-label text-warning">Comodidades</label>
                                    <select name="amenities_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
										@foreach($amenities as $ameni)
                                            <option value="{{ $ameni->amenities_name }}" {{ (in_array($ameni->amenities_name, $property_ami)) ? 'selected' : '' }}>{{ $ameni->amenities_name }}</option>
                                        @endforeach
									</select>
                                </div><!-- Col -->

                                {{-- Agent --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Agente</label>
                                        <select name="agent_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Agente</option>
                                            @foreach($activeAgent as $agent)
                                                <option value="{{ $agent->id }}" {{ $agent->id == $property->agent_id ? 'selected' : '' }}>{{ $agent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Short Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label text-warning">Descripción Corta</label>
                                    <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $property->short_descp }}</textarea>
                                </div>
                            </div>

                            {{-- Long Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label text-warning">Descripción Larga</label>
                                    <textarea name="long_descp" class="form-control" id="tinymceExample" rows="10">
                                        {!! $property->long_descp !!}
                                    </textarea>
                                </div>
                            </div><!-- Col -->

                            {{-- Lina Horizontal --}}
                            <hr>

                            {{-- Checkboxes Features Property y Hot Property --}}
                            <div class="mb-3">

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="featured" value="1" class="form-check-input" id="checkInline1" {{ $property->featured == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label text-warning" for="checkInline1">
                                        Popular
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="hot" value="1" class="form-check-input" id="checkInline" {{ $property->hot == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label text-warning" for="checkInline">
                                        Especial
                                    </label>
                                </div>

                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary">Salvar Cambios</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

{{-- Property Main Thumbnail Image Update  --}}
<div class="page-content" style="margin-top: -35px">
    <div class="row profile-body">

        <!-- wrapper datos para editar con el total del ancho 12 columnas -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Editar Imagen Miniatura Principal</h6>

                        <form method="POST" action="{{ route('update.property.thumbnail') }}" id="myForm" enctype="multipart/form-data">
                        @csrf

                            {{-- Para capturar el id del record que queremos editar --}}
                            <input type="hidden" name="id" value="{{ $property->id }}">
                            {{-- Enviar también la imagen vieja para poder borrarla --}}
                            <input type="hidden" name="old_img" value="{{ $property->property_thambnail }}">

                            {{-- Escoger Nueva y Ver Imagen Miniatura Anterior --}}
                            <div class="row mb-3">

                                {{-- Escoger Nueva - picture thumbnail --}}
                                <div class="form-group col-md-6">
                                    <label class="form-label text-warning">Imagen Miniatura</label>
                                    <input type="file" name="property_thambnail" class="form-control"
                                        onChange="mainThamUrl(this)">
                                    <img src="" id="mainThmb">
                                </div>

                                {{-- picture thumbnail Anterior old_img --}}
                                <div class="form-group col-md-6">
                                    <label class="form-label text-warning"></label>
                                    <img src="{{ asset($property->property_thambnail) }}" alt="" style="width: 100px; height: 100px;">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Salvar Cambios</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

{{-- Property Multiple Image Update  --}}
<div class="page-content" style="margin-top: -35px">
    <div class="row profile-body">

        <!-- wrapper datos para editar con el total del ancho 12 columnas -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Editar Imágenes Multiples de la Propiedad</h6>

                        {{-- Tabla con Botones de acción actualizar y borrar --}}
                        <form method="POST" action="{{ route('update.property.multi-image') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Imagen</th>
                                        <th>Cambiar Imagen</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multiImage as $key => $img)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($img->photo_name) }}" alt="image" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>
                                                <input type="file" class="form-control" name="multi_img[{{ $img->id }}]">
                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-primary px-4" value="Actualizar Imagen">
                                                <a href="{{ route('delete.property.multi-image', $img->id) }}" class="btn btn-danger" id="delete">Borrar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </form>

                        {{-- solo botón par añadir una multi imagen  --}}
                        <form method="POST" action="{{ route('store.new.multi-image') }}" id="myForm" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="imageId" value="{{ $property->id }}">

                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="file" class="form-control" name="multi_img">
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-info px-4" value="Añadir Imagen">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </form>


                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

{{-- Update Facilities - Actualizar Instalaciones Cercanas  --}}
<div class="page-content" style="margin-top: -35px">
    <div class="row profile-body">
        <!-- wrapper datos para editar con el total del ancho 12 columnas -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Editar Instalaciones Cercanas de la Propiedad</h6>

                        <form method="POST" action="{{ route('update.property.facilities') }}" id="myForm" enctype="multipart/form-data">
                        @csrf

                            {{-- Para capturar el id del record que queremos editar --}}
                            <input type="hidden" name="id" value="{{ $property->id }}">

                            @foreach ($facilities as $item)

                            {{-- Facilities Option / Instalaciones Cercanas --}}
                            <div class="row add_item">
                                <div class="whole_extra_item_add" id="whole_extra_item_add">
                                    <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                        <div class="container mt-2">
                                            <div class="row">
                                                {{-- Input Instalación Cercana con un Select --}}
                                                <div class="form-group col-md-4">
                                                    <label for="facility_name">Instalación Cercana</label>
                                                    <select name="facility_name[]" id="facility_name" class="form-control">

                                                        <option value="">Selecciona Instalación</option>
                                                        <option value="Hospital" {{ $item->facility_name == 'Hospital' ? 'selected' : '' }}>Hospital</option>
                                                        <option value="Super Mercado" {{ $item->facility_name == 'Super Mercado' ? 'selected' : '' }}>Super Mercado</option>
                                                        <option value="Escuela" {{ $item->facility_name == 'Escuela' ? 'selected' : '' }}>Escuela</option>
                                                        <option value="Entretenimiento" {{ $item->facility_name == 'Entretenimiento' ? 'selected' : '' }}>Entretenimiento</option>
                                                        <option value="Farmacia" {{ $item->facility_name == 'Farmacia' ? 'selected' : '' }}>Farmacia</option>
                                                        <option value="Aeropuerto" {{ $item->facility_name == 'Aeropuerto' ? 'selected' : '' }}>Aeropuerto</option>
                                                        <option value="Estación de Tren" {{ $item->facility_name == 'Estación de Tren' ? 'selected' : '' }}>Estación de Tren</option>
                                                        <option value="Parada de autobus" {{ $item->facility_name == 'Parada de autobus' ? 'selected' : '' }}>Parada de autobus</option>
                                                        <option value="Playa" {{ $item->facility_name == 'Playa' ? 'selected' : '' }}>Playa</option>
                                                        <option value="Centro Comercial" {{ $item->facility_name == 'Centro Comercial' ? 'selected' : '' }}>Centro Comercial</option>
                                                        <option value="Banco" {{ $item->facility_name == 'Banco' ? 'selected' : '' }}>Banco</option>
                                                        <option value="Cine" {{ $item->facility_name == 'Cine' ? 'selected' : '' }}>Cine</option>
                                                        <option value="Restaurante" {{ $item->facility_name == 'Restaurante' ? 'selected' : '' }}>Restaurante</option>

                                                    </select>
                                                </div>
                                                {{-- Input Distancia --}}
                                                <div class="form-group col-md-4">
                                                    <label for="distance">Distancia</label>
                                                    <input type="text" name="distance[]" id="distance" class="form-control" value="{{ $item->distance }}">
                                                </div>
                                                {{-- Botones de Agregar y Remover --}}
                                                <div class="form-group col-md-4" style="padding-top: 20px">
                                                    <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Agregar</i></span>
                                                    <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remover</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                            <br><br>
                            <button type="submit" class="btn btn-primary">Salvar Cambios</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--========== Start of add multiple class with ajax, Para agregar mas opciones a Facilities Option / Instalaciones Cercanas ==============-->
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="container mt-2">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="facility_name">Instalación Cercana</label>
                        <select name="facility_name[]" id="facility_name" class="form-control">

                            <option value="">Selecciona Instalación</option>
                            <option value="Hospital">Hospital</option>
                            <option value="Super Mercado">Super Mercado</option>
                            <option value="Escuela">Escuela</option>
                            <option value="Entretenimiento">Entretenimiento</option>
                            <option value="Farmacia">Farmacia</option>
                            <option value="Aeropuerto">Aeropuerto</option>
                            <option value="Estación de Tren">Estación de Tren</option>
                            <option value="Parada de autobus">Parada de autobus</option>
                            <option value="Playa">Playa</option>
                            <option value="Centro Comercial">Centro Comercial</option>
                            <option value="Banco">Banco</option>
                            <option value="Cine">Cine</option>
                            <option value="Restaurante">Restaurante</option>

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="distance">Distancia</label>
                        <input type="text" name="distance[]" id="distance" class="form-control"
                            placeholder="Distancia en (Km)">
                    </div>
                    <div class="form-group col-md-4" style="padding-top: 20px">
                        <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Agregar</i></span>
                        <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remover</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!----For Section-------->
<script type="text/javascript">
    $(document).ready(function(){
       var counter = 0;
       $(document).on("click",".addeventmore",function(){
             var whole_extra_item_add = $("#whole_extra_item_add").html();
             $(this).closest(".add_item").append(whole_extra_item_add);
             counter++;
       });
       $(document).on("click",".removeeventmore",function(event){
             $(this).closest("#whole_extra_item_delete").remove();
             counter -= 1
       });
    });
</script>
<!--========== End of add multiple class with ajax ==============-->

{{-- Script de JS para la Validación --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({

            rules: {
                property_name: {
                    required : true,
                },
                property_status: {
                    required : true,
                },
                lowest_price: {
                    required : true,
                },
                max_price: {
                    required : true,
                },
                ptype_id: {
                    required : true,
                },

            },

            messages :{

                property_name: {
                    required : 'Favor entrar nombre de la Propiedad, campo requerido',
                },
                property_status: {
                    required : 'Favor seleccionar Estatus de la Propiedad, campo requerido',
                },
                lowest_price: {
                    required : 'Favor entrar precio mas bajo, campo requerido',
                },
                max_price: {
                    required : 'Favor entrar precio mas alto, campo requerido',
                },
                ptype_id: {
                    required : 'Favor seleccionar Tipo de Propiedad, campo requerido',
                },

            },

            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>

{{-- Script de JS para visualizar la imagen --}}
<script type="text/javascript">
    function mainThamUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

{{-- Script de JS para visualizar multiples imágenes --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
        });
    });

</script>

@endsection
