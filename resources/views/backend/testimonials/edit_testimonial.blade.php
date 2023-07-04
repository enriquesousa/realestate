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

                        <h6 class="card-title">Editar Testimonial</h6>

                        <form method="POST" action="{{ route('update.testimonial') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="id" value="{{ $testimonial->id }}">
                            <input type="hidden" name="image_original" value="{{ $testimonial->image }}">

                            {{-- name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}">
                            </div>

                            {{-- position --}}
                            <div class="mb-3">
                                <label for="position" class="form-label">Posición</label>
                                <input type="text" name="position" class="form-control" value="{{ $testimonial->position }}">
                            </div>

                            {{-- message --}}
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensaje</label>
                                <textarea name="message" class="form-control" id="message" rows="3">{{ $testimonial->message }}</textarea>
                            </div>

                            {{-- Seleccionar Photo --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            {{-- Desplegar Photo --}}
                            <div class="mb-3">
                                <label for="showImage" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ asset($testimonial->image) }}" alt="image">
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
