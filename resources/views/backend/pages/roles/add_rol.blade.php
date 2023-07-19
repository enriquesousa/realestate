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

                        <h6 class="card-title text-warning">Añadir Rol</h6>

                        <form id="myForm" method="POST" action="{{ route('store.rol') }}" class="forms-sample">
                        @csrf


                            {{-- Nombre Permiso --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" autofocus>
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
