@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.amenities') }}" class="btn btn-inverse-info">Añadir Comodidad</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Amenities All</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Amenities Name</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($amenities as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->amenities_name }}</td>
                                    <td>

                                        @if (Auth::user()->can('edit.amenities'))
                                            <a href="{{ route('edit.amenities',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        @endif

                                        @if (Auth::user()->can('delete.amenities'))
                                            <a href="{{ route('delete.amenities',$item->id) }}" class="btn btn-inverse-danger" id="delete">Borrar</a>
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
