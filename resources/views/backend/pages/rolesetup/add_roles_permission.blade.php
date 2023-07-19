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

                        <h6 class="card-title text-warning">Añadir Rol en Permisos</h6>

                        <form id="myForm" method="POST" action="{{ route('store.rol') }}" class="forms-sample">
                        @csrf


                            {{-- Select Rol --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Seleccionar un Rol</label>
                                <select name="rol_id" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Seleccionar Grupo</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- CheckBox --}}
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Todos los Permisos
                                </label>
                            </div>

                            <hr>

                            @foreach ($permission_groups as $group)
                            <div class="row">

                                <div class="col-3">

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefault">
                                        <label class="form-check-label" for="checkDefault">
                                            {{ $group->group_name }}
                                        </label>
                                    </div>

                                </div>

                                <div class="col-9">

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefault">
                                        <label class="form-check-label" for="checkDefault">
                                            Todos los Permisos
                                        </label>
                                    </div>

                                </div>

                            </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
