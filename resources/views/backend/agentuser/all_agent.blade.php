@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.agent') }}" class="btn btn-inverse-info">Añadir Agente</a>
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

                                    {{-- Serie --}}
                                    <td>{{ $key+1 }}</td>

                                    {{-- Foto --}}
                                    <td><img src="{{ (!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg') }}" style="width: 60px; height: 60px;"></td>

                                    {{-- Nombre --}}
                                    <td>{{ $item->name }}</td>

                                    {{-- Role --}}
                                    <td>{{ $item->role }}</td>

                                    {{-- Desplegar Status Activo - Inactivo --}}
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge rounded-pill bg-success">Activo</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactivo</span>
                                        @endif
                                    </td>

                                    {{-- Botón Cambiar Status Activo - Inactivo --}}
                                    <td>
                                        <input data-id="{{ $item->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger"  data-toggle="toggle" data-on="ESTATUS" data-off="ESTATUS" {{ $item->status ? 'checked' : '' }} >
                                    </td>

                                    {{-- Acción Botones Editar - Eliminar --}}
                                    <td>

                                        @if (Auth::user()->can('edit.agente'))
                                            <a href="{{ route('edit.agent',$item->id) }}" class="btn btn-inverse-warning" title="Editar"><i data-feather="edit"></i></a>
                                        @endif

                                        @if (Auth::user()->can('delete.agente'))
                                            <a href="{{ route('delete.agent',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>
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

{{-- JS para el botón de toggle de active o inactive agent - Cambiar ESTATUS --}}
<script type="text/javascript">
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 'active' : 'inactive';
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
                // console.log(data.success)

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        })
                }else{
                        Toast.fire({
                        type: 'error',
                        title: data.error,
                        })
                }
                // End Message

                // para refrescar la ventana
                window.location.reload();
            }
        });
    })
  })
</script>

@endsection
