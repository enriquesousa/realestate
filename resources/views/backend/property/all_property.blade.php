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
                                    <th>Estatus</th>
                                    <th>Agente</th>
                                    <th>Popular</th>
                                    <th>Especial</th>
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

                                    <td>
                                        @if ($item->agent_id == Null)
                                            {{-- <figure class="author-thumb"><img src="{{ url('upload/admin.png') }}" alt=""></figure> --}}
                                            <h6>Admin</h6>
                                        @else
                                            {{-- <figure class="author-thumb"><img src="{{ (!empty($item->user->photo)) ? url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure> --}}
                                            <h6>{{ $item->user->name }}</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->featured == 1)
                                            <span class="badge rounded-pill bg-success"><i data-feather="check-circle"></i></span>
                                        @else
                                            <span class="badge rounded-pill bg-danger"><i data-feather="x"></i></span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->hot == 1)
                                            <span class="badge rounded-pill bg-success"><i data-feather="check-circle"></i></span>
                                        @else
                                            <span class="badge rounded-pill bg-danger"><i data-feather="x"></i></span>
                                        @endif
                                    </td>


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

                                        @if (Auth::user()->can('edit.property'))
                                            <a href="{{ route('edit.property',$item->id) }}" class="btn btn-inverse-warning" title="Editar"><i data-feather="edit"></i></a>
                                        @endif

                                        @if (Auth::user()->can('delete.property'))
                                            <a href="{{ route('delete.property',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>
                                        @endif

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
