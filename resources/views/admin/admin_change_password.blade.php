@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- left wrapper - Datos actuales del perfil -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">

                        {{-- Foto --}}
                        <div>
                            <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                            <span class="h4 ms-3">{{ $profileData->username }}</span>
                        </div>

                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                        <p class="text-muted">{{ $profileData->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $profileData->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $profileData->phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ $profileData->address }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Admin Cambiar Contraseña</h6>

                        <form method="POST" action="{{ route('admin.update.password') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf


                            {{-- Old Password --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Contraseña Vieja</label>
                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- New Password --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Contraseña Nueva</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Confirmar Contraseña Nueva</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


@endsection
