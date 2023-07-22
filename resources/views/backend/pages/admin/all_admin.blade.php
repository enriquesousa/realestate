@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.admin') }}" class="btn btn-inverse-info">Agregar Admin</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Todos los Administradores</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Rol</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($allAdmin as $key => $item)
                                <tr>

                                    {{-- Serie --}}
                                    <td>{{ $key+1 }}</td>

                                    {{-- Foto --}}
                                    <td><img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.jpg') }}" style="width: 60px; height: 60px;"></td>

                                    {{-- Nombre --}}
                                    <td>{{ $item->name }}</td>

                                    {{-- Email --}}
                                    <td>{{ $item->email }}</td>

                                    {{-- Phone --}}
                                    <td>{{ $item->phone }}</td>

                                    {{-- Role --}}
                                    <td>
                                        {{-- $item->roles método que viene de spatie --}}
                                        @foreach ($item->roles as $role)
                                            <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                        @endforeach
                                    </td>


                                    {{-- Acción Botones Editar - Eliminar --}}
                                    <td>
                                        <a href="{{ route('edit.agent',$item->id) }}" class="btn btn-inverse-warning" title="Editar"><i data-feather="edit"></i></a>
                                        <a href="{{ route('delete.agent',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>
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
