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

                        <h6 class="card-title">Añadir Comodidad</h6>

                        <form id="myForm" method="POST" action="{{ route('store.amenities') }}" class="forms-sample">
                        @csrf


                            {{-- Amenities Name --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Nombre Comodidad</label>
                                <input type="text" name="amenities_name" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>

                        </form>

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
