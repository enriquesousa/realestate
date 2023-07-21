@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-warning">Lista todos los Roles y Permisos</h6>

                    <div class="table-responsive">
                        <table  class="table">

                            <thead>

                                <tr>
                                    <th style="width:5%">Serie</th>
                                    <th style="width:20%">Rol</th>
                                    <th style="width:65%">Permisos</th>
                                    <th style="width:10%">Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($roles as $key => $item)
                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>

                                    @php
                                        $lb = 0;
                                    @endphp
                                    <td>
                                        @foreach ($item->permissions as $permiso)
                                            <span class="badge bg-success">{{ $permiso->name }}</span>
                                            @php
                                                $lb++;
                                            @endphp
                                            @if ($lb > 4)
                                                @php
                                                    $lb = 0;
                                                @endphp
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.edit.rol',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
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


