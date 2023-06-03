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
                        <h6 class="card-title">Añadir Propiedad</h6>

                        <form>

                            {{-- Row 1, Seleccionar Estatus, Precio mas Bajo, Precio mas Alto, Imagen Miniatura, Imágenes Multiples --}}
                            <div class="row">

                                {{-- Nombre Propiedad --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" name="property_name" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Status --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Estatus</label>
                                        <select name="property_status" class="form-select"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Estatus</option>
                                            <option value="rent">Para Renta</option>
                                            <option value="buy">Para Compra</option>
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                {{-- Lowest Price --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Precio mas Bajo</label>
                                        <input type="text" name="lowest_price" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Max Price --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Precio mas Alto</label>
                                        <input type="text" name="max_price" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- picture thumbnail --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Imagen Miniatura</label>
                                        <input type="file" name="property_thambnail" class="form-control"
                                            onChange="mainThamUrl(this)">
                                        <img src="" id="mainThmb">
                                    </div>
                                </div><!-- Col -->

                                {{-- Multiple Image --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Imágenes Multiples</label>
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
                                        <label class="form-label">Dormitorios</label>
                                        <input type="text" name="bedrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Bathrooms --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Baños</label>
                                        <input type="text" name="bathrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Garage --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Cochera</label>
                                        <input type="text" name="garage" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Garage Size --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Tamaño de Cochera</label>
                                        <input type="text" name="garage_size" class="form-control">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 3, Dirección, Ciudad, Estado --}}
                            <div class="row">

                                {{-- Address --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Dirección</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- City --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Ciudad</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- State --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Estado</label>
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Postal Code --}}
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Código Postal</label>
                                        <input type="text" name="postal_code" class="form-control">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 4, Tamaño Propiedad, Video, Vecindario --}}
                            <div class="row">

                                {{-- Property Size --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tamaño Propiedad</label>
                                        <input type="text" name="property_size"  class="form-control" >
                                    </div>
                                </div><!-- Col -->

                                {{-- Property Video --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Video Propiedad</label>
                                        <input type="text" name="property_video"  class="form-control" >
                                    </div>
                                </div><!-- Col -->

                                {{-- Neighborhood --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Vecindario</label>
                                         <input type="text" name="neighborhood"  class="form-control" >
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 5, Latitud, Longitud --}}
                            <div class="row">

                                {{-- Latitude --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Latitud</label>
                                        <input type="text" name="latitude" class="form-control">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Ve aquí para saber la latitud de una dirección</a>
                                    </div>
                                </div><!-- Col -->

                                {{-- Longitude --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Longitud</label>
                                        <input type="text" name="longitude" class="form-control">
                                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Ve aquí para saber la latitud de una dirección</a>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 6, Tipo de Propiedad, Comodidades, Agente --}}
                            <div class="row">

                                {{-- Property Type --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tipo de Propiedad</label>
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
                                    <label class="form-label">Comodidades</label>
                                    <select name="amenities_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
										@foreach($amenities as $ameni)
                                            <option value="{{ $ameni->id }}">{{ $ameni->amenities_name }}</option>
                                        @endforeach
									</select>
                                </div><!-- Col -->

                                {{-- Agent --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Agente</label>
                                        <select name="agent_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Agente</option>
                                            @foreach($activeAgent as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->


                            {{-- Short Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Descripción Corta</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div><!-- Col -->

                            {{-- Long Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Descripción Larga</label>
                                    <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div><!-- Col -->

                            {{-- Lina Horizontal --}}
                            <hr>

                            {{-- Checkboxes Features Property y Hot Property --}}
                            <div class="mb-3">

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="featured" value="1" class="form-check-input" id="checkInline1">
                                    <label class="form-check-label" for="checkInline1">
                                        Features Property
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="hot" value="1" class="form-check-input" id="checkInline">
                                    <label class="form-check-label" for="checkInline">
                                        Hot Property
                                    </label>
                                </div>

                            </div>

                        </form>

                        <button type="button" class="btn btn-primary submit">Enviar Formulario</button>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

{{-- Script de JS para la Validación --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({

            rules: {

                amenities_name: {
                    required : true,
                },

            },
            messages :{
                amenities_name: {
                    required : 'Favor entrar nombre de amenities, campo requerido',
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
