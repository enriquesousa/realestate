@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.property') }}" class="btn btn-inverse-info">Añadir Propiedad</a>
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
                                    <th>Action</th>
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
                                        <a href="{{ route('edit.amenities',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        <a href="{{ route('delete.amenities',$item->id) }}" class="btn btn-inverse-danger" id="delete">Borrar</a>
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
