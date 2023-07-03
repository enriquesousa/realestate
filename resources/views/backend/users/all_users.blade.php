@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="#" class="btn btn-inverse-info">Añadir un Usuario</a>
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
                                    <td>{{ $key+1 }}</td>

                                    <td>

                                        {{-- @php
                                            $foto =  public_path('upload/admin_images/' . $item->photo);
                                        @endphp --}}
                                        {{-- @dd($foto) --}}


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

                                    <td>{{ $item->name }}</td>

                                    <td>{{ $item->username }}</td>

                                    <td>{{ $item->email }}</td>

                                    <td>{{ $item->role }}</td>

                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge rounded-pill bg-success">Activo</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactivo</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-inverse-warning">Editar</a>
                                        <a href="#" class="btn btn-inverse-danger" id="delete">Borrar</a>
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
