@extends('agent.agent_dashboard')
@section('agent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Agente - Live Chat</h6>

                        {{-- Desplegar componente de vue --}}
                        <div id="app">
                            <chat-message></chat-message>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


@endsection
