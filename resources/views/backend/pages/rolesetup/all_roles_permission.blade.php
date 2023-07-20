@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.roles') }}" class="btn btn-inverse-info">Lista todos los Roles y Permisos</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-warning">Todos los Roles</h6>

                    <div class="table-responsive">
                        <table  class="table">

                            <thead>

                                <tr>
                                    <th style="width:5%">Serie</th>
                                    <th>Rol</th>
                                    <th>Permisos</th>
                                    <th style="width:10%">Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($roles as $key => $item)
                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>

                                    <td>
                                        @foreach ($item->permissions as $permiso)
                                            <span class="badge bg-success">{{ $permiso->name }}</span>
                                        @endforeach
                                    </td>

                                    <td>
                                        <a href="{{ route('edit.rol',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        <a href="{{ route('delete.rol',$item->id) }}" class="btn btn-inverse-danger" id="delete">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


