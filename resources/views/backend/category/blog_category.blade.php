@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.state') }}" class="btn btn-inverse-info">Añadir Categoría</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Blog todas las Categorías</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($category as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->category_slug }}</td>
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
