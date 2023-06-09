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

                        <h6 class="card-title">Editar Agente</h6>

                        <form id="myForm" method="POST" action="{{ route('update.agent') }}" class="forms-sample">
                        @csrf

                            <input type="hidden" name="id" value="{{ $allAgents->id }}">

                            {{-- Name --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Nombre Agente</label>
                                <input type="text" name="name" class="form-control" value="{{ $allAgents->name }}">
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $allAgents->email }}">
                            </div>

                            {{-- Phone --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Teléfono</label>
                                <input type="text" name="phone" class="form-control" value="{{ $allAgents->phone }}">
                            </div>

                            {{-- Address --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Dirección</label>
                                <input type="text" name="address" class="form-control" value="{{ $allAgents->address }}">
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
