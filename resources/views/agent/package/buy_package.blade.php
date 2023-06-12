@extends('agent.agent_dashboard')
@section('agent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            {{-- <a href="{{ route('agent.add.property') }}" class="btn btn-inverse-info">Añadir Buy</a> --}}
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-3 mt-4">Escoge un Plan</h3>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center mt-3 mb-4">Básico</h4>
                                        <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                        <h1 class="text-center">$0</h1>
                                        <p class="text-muted text-center mb-4 fw-light">Limitado</p>
                                        <h5 class="text-primary text-center mb-4">Hasta 1 propiedad</h5>
                                        <table class="mx-auto">
                                            <tr>
                                                <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                <td>
                                                    <p>Hasta 1 propiedad</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                                                <td>
                                                    <p class="text-muted">Soporte de Primera</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="d-grid">
                                            <button class="btn btn-primary mt-4">Start free trial</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center mt-3 mb-4">Negocio</h4>
                                        <i data-feather="gift" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                        <h1 class="text-center">$20</h1>
                                        <p class="text-muted text-center mb-4 fw-light">Meses Ilimitados</p>
                                        <h5 class="text-success text-center mb-4">Hasta 3 Propiedades</h5>
                                        <table class="mx-auto">

                                            <tr>
                                                <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                <td>
                                                    <p>Hasta 3 Propiedades</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                <td>
                                                    <p>Soporte de Primera</p>
                                                </td>
                                            </tr>

                                        </table>
                                        <div class="d-grid">
                                            <button class="btn btn-success mt-4">Start free trial</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center mt-3 mb-4">Profesional</h4>
                                        <i data-feather="briefcase"
                                            class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                        <h1 class="text-center">$50</h1>
                                        <p class="text-muted text-center mb-4 fw-light">Meses Ilimitados</p>
                                        <h5 class="text-primary text-center mb-4">Hasta 10 Propiedades</h5>
                                        <table class="mx-auto">

                                            <tr>
                                                <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                <td>
                                                    <p>Hasta 10 Propiedades</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                <td>
                                                    <p>Soporte de Primera</p>
                                                </td>
                                            </tr>

                                        </table>
                                        <div class="d-grid">
                                            <button class="btn btn-primary mt-4">Start free trial</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
