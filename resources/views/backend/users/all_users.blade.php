@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('admin.add.user') }}" class="btn btn-inverse-info">Añadir un Usuario</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Todos los Usuarios</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Username</th>
                                    <th>Correo</th>
                                    <th>Role</th>
                                    <th>Estatus</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($usuarios as $key => $item)
                                <tr>

                                    {{-- Serie --}}
                                    <td>{{ $key+1 }}</td>

                                    {{-- Foto --}}
                                    <td>

                                        @if ($item->role == 'admin')
                                            <img src="{{ asset('upload/admin_images/'.$item->photo) }}" alt="" style="width:60px; height:60px;"></td>
                                        @else
                                            @if ($item->role == 'agent')
                                                <img src="{{ asset('upload/agent_images/'.$item->photo) }}" alt="" style="width:60px; height:60px;"></td>
                                            @else
                                                <img src="{{ asset('upload/user_images/'.$item->photo) }}" alt="" style="width:60px; height:60px;"></td>
                                            @endif
                                        @endif

                                    </td>

                                    {{-- Nombre --}}
                                    <td>{{ $item->name }}</td>

                                    {{-- Username --}}
                                    <td>{{ $item->username }}</td>

                                    {{-- Correo --}}
                                    <td>{{ $item->email }}</td>

                                    {{-- Role --}}
                                    <td>{{ $item->role }}</td>

                                    {{-- Desplegar Estatus Activo - Inactivo --}}
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge rounded-pill bg-success">Activo</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactivo</span>
                                        @endif
                                    </td>


                                    {{-- Acción Editar - Eliminar--}}
                                    <td>
                                        <a href="#" class="btn btn-inverse-warning">Editar</a>
                                        <a href="#" class="btn btn-inverse-danger" id="delete">Eliminar</a>
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
