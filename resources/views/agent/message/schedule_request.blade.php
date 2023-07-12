{{-- Llamado por: AgentScheduleRequest en app/Http/Controllers/Agent/AgentPropertyController.php  --}}

@extends('agent.agent_dashboard')
@section('agent')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Mensajes de Citas</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Propiedad</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Agendado</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($user_message as $key => $item)
                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    {{-- Foto --}}
                                    <td>
                                        @if ($item->user->role == 'admin')
                                            <img src="{{ asset('upload/admin_images/'.$item->user->photo) }}" alt="" style="width:60px; height:60px;"></td>
                                        @else
                                            @if ($item->user->role == 'agent')
                                                <img src="{{ asset('upload/agent_images/'.$item->user->photo) }}" alt="" style="width:60px; height:60px;"></td>
                                            @else
                                                <img src="{{ asset('upload/user_images/'.$item->user->photo) }}" alt="" style="width:60px; height:60px;"></td>
                                            @endif
                                        @endif
                                    </td>

                                    <td>{{ $item->user->name }}</td>

                                    <td>{{ $item->property->property_name }}</td>

                                    <td>{{ $item->tour_date }}</td>

                                    <td>{{ $item->tour_time }}</td>

                                    {{-- Agendado - Estatus Flag --}}
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge rounded-pill bg-success">Si</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">No</span>
                                        @endif
                                    </td>

                                    {{-- Acción --}}
                                    <td>
                                        <a href="{{ route('agent.details.schedule',$item->id) }}" class="btn btn-inverse-info" title="Detalles"><i data-feather="eye"></i></a>
                                        <a href="{{ route('agent.delete.schedule',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>
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
