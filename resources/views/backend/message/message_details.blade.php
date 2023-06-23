@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        {{-- col-lg-3 - Columna de la izquierda --}}
                        <div class="col-lg-3 border-end-lg">

                            {{-- Mail Service --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="navbar-toggle btn btn-icon border d-block d-lg-none"
                                    data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                    <span class="icon"><i data-feather="chevron-down"></i></span>
                                </button>
                                <div class="order-first">
                                    <h4>Servicio de Correo</h4>
                                    <p class="text-muted">soporte@gmail.com</p>
                                </div>
                            </div>

                            {{-- Compose Email --}}
                            <div class="d-grid my-3">
                                <a class="btn btn-primary" href="./compose.html">Compose Email</a>
                            </div>

                            {{-- Inbox, Sent Mail, Important, Drafts, Tags, Trash --}}
                            <div class="email-aside-nav collapse">
                                <ul class="nav flex-column">

                                    <li class="nav-item active">
                                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.property.message') }}">
                                            <i data-feather="inbox" class="icon-lg me-2"></i>
                                            Bandeja de Entrada
                                            <span class="badge bg-danger fw-bolder ms-auto">{{ count($allMessages) }}
                                        </a>
                                    </li>

                                </ul>

                                <p class="text-muted tx-12 fw-bolder text-uppercase mb-2 mt-4">Labels</p>

                                {{-- Labels --}}
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="#">
                                            <i data-feather="tag" class="text-warning icon-lg me-2"></i>
                                            Important
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="#">
                                            <i data-feather="tag" class="text-primary icon-lg me-2"></i>
                                            Business
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="#">
                                            <i data-feather="tag" class="text-info icon-lg me-2"></i>
                                            Inspiration
                                        </a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                        {{-- col-lg-9 - Columna de la derecha --}}
                        <div class="col-lg-9">

                            {{-- Inbox - Titulo de tabla --}}
                            <div class="p-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-end mb-2 mb-md-0">
                                            <i data-feather="inbox" class="text-muted me-2"></i>
                                            <h4 class="me-1">Bandeja de Entrada</h4>
                                            <span class="text-muted">({{ count($allMessages) }} mensajes)</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Search mail...">
                                            <button class="btn btn-light btn-icon" type="button"
                                                id="button-search-addon"><i data-feather="search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- message details --}}
                            <div class="email-list">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <th>Nombre del Cliente:</th>
                                                <td>{{ $msgDetails['user']['name'] }}</td>
                                            </tr>

                                            <tr>
                                                <th>Correo Electrónico del Cliente:</th>
                                                <td>{{ $msgDetails['user']['email'] }}</td>
                                            </tr>

                                            <tr>
                                                <th>Teléfono del Cliente:</th>
                                                <td>{{ $msgDetails['user']['phone'] }}</td>
                                            </tr>

                                            <tr>
                                                <th>Nombre de la Propiedad:</th>
                                                <td>{{ $msgDetails['property']['property_name'] }}</td>
                                            </tr>

                                            <tr>
                                                <th>Código de la Propiedad:</th>
                                                <td>{{ $msgDetails['property']['property_code'] }}</td>
                                            </tr>

                                            <tr>
                                                <th>Estatus de la Propiedad:</th>
                                                <td>{{ $msgDetails['property']['property_status'] }}</td>
                                            </tr>

                                            <tr>
                                                <th>Mensaje:</th>
                                                <td>{{ $msgDetails->message }}</td>
                                            </tr>

                                            <tr>
                                                <th>Fecha del mensaje:</th>
                                                <td>{{ $msgDetails->created_at->format('l d M') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
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
