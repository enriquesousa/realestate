@extends('agent.agent_dashboard')
@section('agent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


{{-- Contenido del profile form html --}}
<div class="page-content">
    <div class="row profile-body">
        <!-- wrapper datos para editar con el total del ancho 12 columnas -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Añadir Propiedad</h6>
                        <form method="POST" action="{{ route('agent.store.property') }}" id="myForm" enctype="multipart/form-data">
                        @csrf

                            {{-- Row 1, Seleccionar Estatus, Precio mas Bajo, Precio mas Alto, Imagen Miniatura, Imágenes Multiples --}}
                            <div class="row">

                                {{-- Nombre Propiedad --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Nombre</label>
                                        <input type="text" name="property_name" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Status --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Estatus</label>
                                        <select name="property_status" class="form-select"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Estatus</option>
                                            <option value="renta">Para Renta</option>
                                            <option value="compra">Para Compra</option>
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Lowest Price --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Precio mas Bajo</label>
                                        <input type="text" name="lowest_price" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Max Price --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Precio mas Alto</label>
                                        <input type="text" name="max_price" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- picture thumbnail --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Imagen Miniatura</label>
                                        <input type="file" name="property_thambnail" class="form-control"
                                            onChange="mainThamUrl(this)">
                                        <img src="" id="mainThmb">
                                    </div>
                                </div><!-- Col -->

                                {{-- Multiple Image --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Imágenes Multiples</label>
                                        <input type="file" name="multi_img[]" class="form-control" id="multiImg"
                                            multiple="">
                                        <div class="row" id="preview_img"> </div>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 2, Dormitorios, Baños, Cochera, Tamaño Cochera --}}
                            <div class="row">

                                {{-- BedRooms --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Dormitorios</label>
                                        <input type="text" name="bedrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Bathrooms --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Baños</label>
                                        <input type="text" name="bathrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Garage --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Cochera</label>
                                        <input type="text" name="garage" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Garage Size --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Tamaño de Cochera</label>
                                        <input type="text" name="garage_size" class="form-control">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 3, Dirección, Ciudad, Estado --}}
                            <div class="row">

                                {{-- Address --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Dirección</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- City --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Ciudad</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- State --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Estado</label>
                                        <select name="state" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Estado</option>
                                            @foreach($estado as $item)
                                                <option value="{{ $item->id }}">{{ $item->state_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Postal Code --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Código Postal</label>
                                        <input type="text" name="postal_code" id="postal_code" class="form-control">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 4, Tamaño Propiedad, Video, Vecindario --}}
                            <div class="row">

                                {{-- Property Size --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Tamaño Propiedad</label>
                                        <input type="text" name="property_size"  class="form-control" >
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Video --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Video Propiedad</label>
                                        <input type="text" name="property_video"  class="form-control" >
                                    </div>
                                </div><!-- Col -->

                                {{-- Neighborhood --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Vecindario</label>
                                         <input type="text" name="neighborhood"  class="form-control" >
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 5, Latitud, Longitud --}}
                            <div class="row">

                                {{-- Latitude --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Latitud</label>
                                        <input type="text" name="latitude" class="form-control">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Ve aquí para saber la latitud de una dirección</a>
                                    </div>
                                </div><!-- Col -->

                                {{-- Longitude --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label text-warning">Longitud</label>
                                        <input type="text" name="longitude" class="form-control">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Ve aquí para saber la latitud de una dirección</a>
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
                                                <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Amenities --}}
                                <div class="col-sm-4">
                                    <label class="form-label text-warning">Comodidades</label>
                                    <select name="amenities_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
										@foreach($amenities as $ameni)
                                            <option value="{{ $ameni->amenities_name }}">{{ $ameni->amenities_name }}</option>
                                        @endforeach
									</select>
                                </div><!-- Col -->


                            </div><!-- Row -->


                            {{-- Short Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label text-warning">Descripción Corta</label>
                                    <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div><!-- Col -->

                            {{-- Long Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label text-warning">Descripción Larga</label>
                                    <textarea name="long_descp" class="form-control" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div><!-- Col -->

                            {{-- Lina Horizontal --}}
                            <hr>

                            {{-- Checkboxes Features Property y Hot Property --}}
                            <div class="mb-3">

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="featured" value="1" class="form-check-input" id="checkInline1">
                                    <label class="form-check-label text-warning" for="checkInline1">
                                        Features Property
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="hot" value="1" class="form-check-input" id="checkInline">
                                    <label class="form-check-label text-warning" for="checkInline">
                                        Hot Property
                                    </label>
                                </div>

                            </div>

                            {{-- Facilities Option / Instalaciones Cercanas --}}
                            <div class="row add_item">

                                {{-- Instalaciones Cercanas --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="facility_name" class="form-label">Instalaciones Cercanas</label>
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
                                </div>

                                {{-- Distance --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="distance" class="form-label text-warning">Distancia</label>
                                        <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distancia en (Km)">
                                    </div>
                                </div>

                                {{-- Add More.. --}}
                                <div class="form-group col-md-4" style="padding-top: 30px;">
                                    <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i>Agregar mas...</a>
                                </div>

                            </div>
                            <!---end row-->

                            <hr>
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

        // https://ej2.syncfusion.com/javascript/documentation/form-validator/validation-rules
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
                    number: true,
                    digits: true,
                },
                max_price: {
                    required : true,
                    number: true,
                    digits: true,
                },
                ptype_id: {
                    required : true,
                },
                property_thambnail: {
                    required : true,
                },
                multi_img: {
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
                    number : 'Favor entrar un numero valido',
                },
                max_price: {
                    required : 'Favor entrar precio mas alto, campo requerido',
                    number : 'Favor entrar un numero valido',
                },
                ptype_id: {
                    required : 'Favor seleccionar Tipo de Propiedad, campo requerido',
                },
                property_thambnail: {
                    required : 'Favor seleccionar una imagen, campo requerido',
                },
                multi_img: {
                    required : 'Favor seleccionar una imagen, campo requerido',
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
