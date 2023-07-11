{{-- Llamado por: AgentDetailsSchedule en app/Http/Controllers/Agent/AgentPropertyController.php --}}

@extends('agent.agent_dashboard')
@section('agent')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>

    {{-- Tabla de información--}}
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Detalles de la solicitud</h6>

                    <form method="POST" action="{{ route('agent.update.schedule') }}">
                    @csrf

                        <input type="hidden" name="id" value="{{ $schedule->id   }}">
                        <input type="hidden" name="email" value="{{ $schedule->user->email   }}">

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <tbody>

                                    {{-- Use Name --}}
                                    <tr>
                                        <td>Nombre</td>
                                        <td>{{ $schedule->user->name }}</td>
                                    </tr>

                                    {{-- Property Name --}}
                                    <tr>
                                        <td>Propiedad</td>
                                        <td>{{ $schedule->property->property_name }}</td>
                                    </tr>

                                    {{-- Fecha Solicitada --}}
                                    <tr>
                                        <td>Fecha Solicitada</td>
                                        <td>{{ $schedule->tour_date }}</td>
                                    </tr>

                                    {{-- Hora Solicitada --}}
                                    <tr>
                                        <td>Hora Solicitada</td>
                                        <td>{{ $schedule->tour_time }}</td>
                                    </tr>

                                    {{-- Mensaje --}}
                                    <tr>
                                        <td>Mensaje</td>
                                        <td>{{ $schedule->message }}</td>
                                    </tr>

                                    {{-- Fecha de Solicitud --}}
                                    <tr>
                                        <td>Solicitado el</td>
                                        <td>{{ $schedule->created_at->format('d M Y h:i A') }} ({{ __($schedule->created_at->format('l')) }})</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <br><br>
                        <button type="submit" class="btn btn-success">Confirmar Cita</button>
                        <br><br>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
