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
                                        <input type="file" name="lowest_price" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                {{-- Multiple Image --}}
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Imágenes Multiples</label>
                                        <input type="file" name="lowest_price" class="form-control">
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

@endsection
