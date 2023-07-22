@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.permission') }}" class="btn btn-inverse-info">Añadir Permiso</a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('import.permission') }}" class="btn btn-inverse-warning"><i data-feather="upload-cloud"></i>&nbsp;&nbsp;Importar</a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('export') }}" class="btn btn-inverse-danger"><i data-feather="download-cloud"></i>&nbsp;&nbsp;Exportar</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-warning">Todos los Permisos</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th style="width:5%">Serie</th>
                                    ta<th class="text-center">Nombre</th>
                                    <th class="text-center">Grupo</th>
                                    <th style="width:10%">Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($permissions as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->group_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.permission',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        <a href="{{ route('delete.permission',$item->id) }}" class="btn btn-inverse-danger" id="delete">Eliminar</a>
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


