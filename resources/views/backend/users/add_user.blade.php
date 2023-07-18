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

                        <h6 class="card-title text-warning">Añadir Usuario</h6>

                        <form id="myForm" method="POST" action="{{ route('store.agent') }}" class="forms-sample">
                        @csrf

                            {{-- Name --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre con apellido, campo requerido!">Nombre &nbsp;&nbsp;<span class="badge border border-danger text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Username --}}
                            <div class="form-group mb-3">
                                <label for="username" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Una sola palabra en minúsculas">Nombre Corto (username) &nbsp;&nbsp;<i data-feather="help-circle" style="width:15px; height:15px;"></i></label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror">
                                @error('username')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                             {{-- Select Role --}}
                             <div class="form-group mb-3">
                                <label for="role" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione un Rol de usuario, campo requerido!">Rol &nbsp;&nbsp;<span class="badge border border-danger text-danger">*</span></label>
                                <select name="role" class="form-select"
                                    id="role">
                                    <option selected="" disabled="">Seleccionar Rol</option>
                                    <option value="admin">Administrador</option>
                                    <option value="agent">Agente</option>
                                    <option value="user">Usuario</option>
                                </select>
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Entre correo electrónico, campo requerido!">Correo Electrónico &nbsp;&nbsp;<span class="badge border border-danger text-danger">*</span></label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            {{-- Phone --}}
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Formato (664) 123-45-67">Teléfono &nbsp;&nbsp;<i data-feather="help-circle" style="width:15px; height:15px;"></i></label>
                                <input type="text" name="phone" class="form-control" >
                            </div>

                            {{-- Address --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Dirección</label>
                                <input type="text" name="address" class="form-control">
                            </div>

                            {{-- Password --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Entre una contraseña, campo requerido!">Contraseña &nbsp;&nbsp;<span class="badge border border-danger text-danger">*</span></label>
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
                role: {
                    required : true,
                },
                email: {
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
                role: {
                    required : 'Favor de seleccionar un rol, campo requerido',
                },
                email: {
                    required : 'Favor entrar correo, campo requerido',
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

    // Format phone number
    // https://stackoverflow.com/questions/17980061/how-to-change-phone-number-format-in-input-as-you-type
    $("input[name='phone']").keyup(function() {
        // $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d{2})(\d+)$/, "($1) $2-$3-$4"));
        $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d{4})$/, "($1) $2-$3"));
    });

</script>

@endsection
