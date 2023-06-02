@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Añadir Tipo de Propiedad</h6>

                        <form method="POST" action="{{ route('store.type') }}" class="forms-sample">
                        @csrf


                            {{-- Type Name --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tipo</label>
                                <input type="text" name="type_name" class="form-control @error('type_name') is-invalid @enderror">
                                @error('type_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Type Icon --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tipo de Icono</label>
                                <input type="text" name="type_icon" class="form-control @error('type_icon') is-invalid @enderror">
                                @error('type_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


@endsection
