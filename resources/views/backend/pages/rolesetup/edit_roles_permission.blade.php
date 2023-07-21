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

                        <h6 class="card-title text-warning">Editar Permisos para Rol</h6>

                        <form id="myForm" method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="forms-sample">
                        @csrf


                            {{-- Rol --}}
                            <div class="form-group mb-3">
                                {{-- <label for="name" class="form-label">Seleccionar un Rol</label> --}}
                                <h3>{{ $role->name }}</h3>
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

                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                    @endphp

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefault" {{ App\Models\User::rolHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkDefault">
                                            {{ $group->group_name }}
                                        </label>
                                    </div>

                                </div>

                                <div class="col-9">

                                    @foreach ($permissions as $permission)
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
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
