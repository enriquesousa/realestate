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

                        <h6 class="card-title">Actualizar Configuración Sitio</h6>

                        <form id="myForm" method="POST" action="{{ route('update.site.setting') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="id" value="{{ $site_setting->id }}">

                            {{-- support_phone --}}
                            <div class="form-group mb-3">
                                <label for="support_phone" class="form-label">Teléfono</label>
                                <input type="text" name="support_phone" class="form-control" value="{{ $site_setting->support_phone }}">
                            </div>

                            {{-- company_address --}}
                            <div class="form-group mb-3">
                                <label for="company_address" class="form-label">Dirección</label>
                                <input type="text" name="company_address" class="form-control" value="{{ $site_setting->company_address }}">
                            </div>

                            {{-- email  --}}
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $site_setting->email }}">
                            </div>

                            {{-- facebook --}}
                            <div class="form-group mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{ $site_setting->facebook }}">
                            </div>

                            {{-- twitter --}}
                            <div class="form-group mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{ $site_setting->twitter }}">
                            </div>

                             {{-- copyright --}}
                             <div class="form-group mb-3">
                                <label for="copyright" class="form-label">Copyright</label>
                                <input type="text" name="copyright" class="form-control" value="{{ $site_setting->copyright }}">
                            </div>

                            {{-- Seleccionar Photo Logo --}}
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo" id="image">
                            </div>

                            {{-- Desplegar Photo --}}
                            <div class="mb-3">
                                <label for="logo_display" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ asset($site_setting->logo) }}" alt="logo 1500x386 px">
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
