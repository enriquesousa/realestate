@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.property') }}" class="btn btn-inverse-info">Añadir Agente</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Todos los Agentes</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Estatus</th>
                                    <th>Cambiar</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($allAgents as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ (!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg') }}" style="width: 70px; height: 40px;"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->role }}</td>

                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge rounded-pill bg-success">Activo</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactivo</span>
                                        @endif
                                    </td>

                                    <td>
                                        Cambiar
                                    </td>

                                    <td>

                                        <a href="{{ route('edit.property',$item->id) }}" class="btn btn-inverse-warning" title="Editar"><i data-feather="edit"></i></a>

                                        <a href="{{ route('delete.property',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>
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
