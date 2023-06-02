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

                            {{-- Row 1 --}}
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
                                        <input type="file" name="property_thambnail" class="form-control" onChange="mainThamUrl(this)"  >
                                        <img src="" id="mainThmb">
                                    </div>
                                </div><!-- Col -->

                                {{-- Multiple Image --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Imágenes Multiples</label>
                                        <input type="file" name="multi_img[]" class="form-control" id="multiImg" multiple="">
                                        <div class="row" id="preview_img"> </div>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 2 --}}
                            <div class="row">

                                {{-- City --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" placeholder="Enter city">
                                    </div>
                                </div><!-- Col -->

                                {{-- State --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Estado</label>
                                        <input type="text" class="form-control" placeholder="Enter state">
                                    </div>
                                </div><!-- Col -->

                                {{-- Zip Code --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Código Postal</label>
                                        <input type="text" class="form-control" placeholder="Enter zip code">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

                            {{-- Row 3 --}}
                            <div class="row">

                                {{-- Email address --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </div><!-- Col -->

                                {{-- Password --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" autocomplete="off"
                                            placeholder="Password">
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->

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
