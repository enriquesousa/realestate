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

                        <h6 class="card-title">Editar Estado (Entidad Federativa)</h6>

                        <form method="POST" action="{{ route('update.state') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="id" value="{{ $state->id }}">
                            <input type="hidden" name="store_image" value="{{ $state->state_image }}">

                            {{-- state_name --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del Estado</label>
                                <input type="text" name="state_name" class="form-control" value="{{ $state->state_name }}">
                            </div>

                            {{-- Seleccionar Photo --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="state_image" id="image">
                            </div>

                            {{-- Desplegar Photo --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ asset($state->state_image) }}" alt="state image">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

{{-- Funcionalidad con la imagen --}}
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
