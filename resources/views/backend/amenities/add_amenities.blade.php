@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Añadir Amenities</h6>

                        <form method="POST" action="{{ route('store.type') }}" class="forms-sample">
                        @csrf


                            {{-- Type Name --}}
                            <div class="mb-3">
                                <label for="amenities_name" class="form-label">Amenities Name</label>
                                <input type="text" name="amenities_name" class="form-control @error('amenities_name') is-invalid @enderror">
                                @error('amenities_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
