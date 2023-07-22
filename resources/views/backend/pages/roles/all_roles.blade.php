@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.roles') }}" class="btn btn-inverse-info">Añadir Role</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-warning">Todos los Roles</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th style="width:5%">Serie</th>
                                    <th>Nombre</th>
                                    <th style="width:10%">Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($roles as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
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


