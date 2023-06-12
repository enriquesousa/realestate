@extends('agent.agent_dashboard')
@section('agent')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('agent.add.property') }}" class="btn btn-inverse-info">Añadir Propiedad</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Todas las Propiedades</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Tipo Estatus</th>
                                    <th>Ciudad</th>
                                    <th>Código</th>
                                    <th>Estatus</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($property as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->property_thambnail) }}" style="width: 70px; height: 40px;"></td>
                                    <td>{{ $item->property_name }}</td>
                                    <td>{{ $item['type']['type_name'] }}</td>
                                    <td>{{ $item->property_status }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->property_code }}</td>

                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge rounded-pill bg-success">Activa</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactiva</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('details.property',$item->id) }}" class="btn btn-inverse-info" title="Detalles"><i data-feather="eye"></i></a>

                                        <a href="{{ route('agent.edit.property',$item->id) }}" class="btn btn-inverse-warning" title="Editar"><i data-feather="edit"></i></a>

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
