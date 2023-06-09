@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Añadir Agente</h6>

                        <form id="myForm" method="POST" action="{{ route('store.agent') }}" class="forms-sample">
                        @csrf

                            {{-- Name --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Nombre Agente</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            {{-- Phone --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Teléfono</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            {{-- Address --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Dirección</label>
                                <input type="text" name="address" class="form-control">
                            </div>

                            {{-- Password --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

{{-- JS Validation --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({

            rules: {

                name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                password: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Favor entrar nombre, campo requerido',
                },
                email: {
                    required : 'Favor entrar correo, campo requerido',
                },
                phone: {
                    required : 'Favor entrar teléfono, campo requerido',
                },
                password: {
                    required : 'Favor entrar contraseña, campo requerido',
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
