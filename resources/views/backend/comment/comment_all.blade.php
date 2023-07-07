@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Comentarios del Blog</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Titulo</th>
                                    <th>Usuario</th>
                                    <th>Tema</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($comments as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->post->post_title }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>
                                        <a href="{{ route('edit.state',$item->id) }}" class="btn btn-inverse-warning">Contestar</a>
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
