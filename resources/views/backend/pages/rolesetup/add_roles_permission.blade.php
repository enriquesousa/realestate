@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">
    .form-check-label{
        text-transform: capitalize;
    }
</style>

{{-- Contenido del profile form html --}}
<div class="page-content">
    <div class="row profile-body">
        <!-- wrapper derecha datos para editar -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title text-warning">Añadir Rol en Permisos</h6>

                        <form id="myForm" method="POST" action="{{ route('role.permission.store') }}" class="forms-sample">
                        @csrf


                            {{-- Select Rol --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Seleccionar un Rol</label>
                                <select name="rol_id" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Seleccionar Rol</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- CheckBox --}}
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkDefaultMain">
                                <label class="form-check-label" for="checkDefaultMain">
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

                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                    @endphp

                                    @foreach ($permissions as $permission)
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}">
                                            <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <br>

                                </div>
                                <hr>

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

{{-- Si seleccionamos checkbox 'Todos los Permisos', seleccionamos todos los input checkboxes a true de la forma --}}
<script type="text/javascript">

    $('#checkDefaultMain').click(function(){
      if ($(this).is(':checked')) {
        $('input[ type= checkbox]').prop('checked',true);
      }else{
         $('input[ type= checkbox]').prop('checked',false);
      }
    });

</script>

@endsection
