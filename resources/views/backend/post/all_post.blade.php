@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.state') }}" class="btn btn-inverse-info">Añadir Post</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Todos los Post</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Titulo</th>
                                    <th>Categoría</th>
                                    <th>Imagen</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($post as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td>{{ $item->post_title }}</td>

                                    <td>{{ $item->blogcat_id }}</td>

                                    <td>
                                        <img src="{{ asset($item->post_image) }}" alt="" style="width:70px; height:40px;">
                                    </td>

                                    <td>
                                        <a href="{{ route('edit.state',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        <a href="{{ route('delete.state',$item->id) }}" class="btn btn-inverse-danger" id="delete">Eliminar</a>
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
