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

                        <h6 class="card-title text-warning">Editar Admin</h6>

                        <form id="myForm" method="POST" action="{{ route('update.admin', $user->id) }}" class="forms-sample">
                        @csrf

                            {{-- Name --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>

                            {{-- Name Corto (username) --}}
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">Nombre Corto</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                            </div>

                             {{-- Select Role --}}
                             <div class="form-group mb-3">
                                <label for="role" class="form-label">Rol</label>
                                <select name="roles" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Seleccionar Rol</option>
                                    @foreach ($roles as $item)
                                        {{-- $user->hasRole método de spatie, los toma de la tabla 'model_has_roles' --}}
                                        <option value="{{ $item->id }}" {{ $user->hasRole($item->name) ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>

                            {{-- Phone --}}
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Formato (664) 123-12-34">Teléfono &nbsp;&nbsp;<i data-feather="help-circle" style="width:15px; height:15px;"></i></label>
                                <i class="fa fa-phone"></i>
                                <input type="text" name="phone" class="form-control" data-inputmask="'mask':[ '(999) 999-9999']" data-mask="" value="{{ $user->phone }}">
                            </div>

                            {{-- Address --}}
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address }}">
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
