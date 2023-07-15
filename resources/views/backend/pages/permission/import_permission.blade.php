@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- Contenido del profile form html --}}
<div class="page-content">


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('export') }}" class="btn btn-inverse-danger"><i data-feather="download-cloud"></i>&nbsp;&nbsp; Bajar Datos a Archivo Excel</a>
        </ol>
    </nav>


    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Importar Permisos</h6>

                        <form id="myForm" method="POST" action="{{ route('import') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf

                            {{-- Importar Archivo Excel --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Importar Archivo Excel</label>
                                <input type="file" name="import_file" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-inverse-warning"><i data-feather="upload-cloud"></i>&nbsp;&nbsp; Subir Archivo</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


@endsection
