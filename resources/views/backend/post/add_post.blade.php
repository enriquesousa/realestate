@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Añadir un Post</h6>

                        <form method="POST" action="{{ route('store.post') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf


                            <div class="row">

                                {{-- Titulo Post --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Titulo</label>
                                        <input type="text" name="post_title" class="form-control @error('post_title') is-invalid @enderror">
                                        @error('post_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->

                                {{-- Escoger Categorías --}}
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-warning">Categoría</label>
                                        <select name="blogcat_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Seleccionar Categoría</option>
                                            @foreach ($blogcat as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                            </div>


                            {{-- Short Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label text-warning">Descripción Corta</label>
                                    <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div><!-- Col -->

                            {{-- Long Description --}}
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label text-warning">Descripción Larga</label>
                                    <textarea name="long_descp" class="form-control" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div><!-- Col -->


                            {{-- Post Tag --}}
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label text-warning">Etiqueta</label>
                                    <input name="post_tags" id="tags" value="Bien Inmobiliario," />
                                </div>
                            </div><!-- Col -->


                            {{-- Seleccionar Photo --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Imagen de Post</label>
                                <input type="file" class="form-control" name="post_image" id="image">
                            </div>

                            {{-- Desplegar Photo --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ url('upload/no_image.jpg') }}" alt="postImage">
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
