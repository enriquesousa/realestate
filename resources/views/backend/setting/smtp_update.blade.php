@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title text-warning">Actualizar Configuración SMTP</h6>

                        <form id="myForm" method="POST" action="{{ route('update.smtp.setting') }}" class="forms-sample">
                        @csrf

                            <input type="hidden" name="id" value="{{ $setting->id }}">

                            {{-- mailer --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Mailer</label>
                                <input type="text" name="mailer" class="form-control" value="{{ $setting->mailer }}">
                            </div>

                             {{-- host --}}
                             <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Host</label>
                                <input type="text" name="host" class="form-control" value="{{ $setting->host }}">
                            </div>

                             {{-- port --}}
                             <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Port</label>
                                <input type="text" name="port" class="form-control" value="{{ $setting->port }}">
                            </div>

                             {{-- username --}}
                             <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $setting->username }}">
                            </div>

                             {{-- password --}}
                             <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" value="{{ $setting->password }}">
                            </div>

                            {{-- encryption --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Encryption</label>
                                <input type="text" name="encryption" class="form-control" value="{{ $setting->encryption }}">
                            </div>

                            {{-- from_address --}}
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">From Address</label>
                                <input type="text" name="from_address" class="form-control" value="{{ $setting->from_address }}">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


@endsection
