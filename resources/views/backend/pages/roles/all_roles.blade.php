@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        @if (Auth::user()->can('add.rol'))
            <ol class="breadcrumb">
                <a href="{{ route('add.roles') }}" class="btn btn-inverse-info">Añadir Role</a>
            </ol>
        @endif
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

                                        @if (Auth::user()->can('edit.rol'))
                                            <a href="{{ route('edit.rol',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        @endif

                                        @if (Auth::user()->can('delete.rol'))
                                            <a href="{{ route('delete.rol',$item->id) }}" class="btn btn-inverse-danger" id="delete">Eliminar</a>
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


