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
                                    <th>Foto</th>
                                    <th>Usuario</th>
                                    <th>Titulo</th>
                                    <th>Tema</th>
                                    <th>Aprobado</th>
                                    <th>Leído</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($comments as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td><img src="{{ (!empty($item->user->photo)) ? url('upload/user_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt="" style="width:70px; height:70px;"></td>

                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->post->post_title }}</td>
                                    <td>{{ $item->subject }}</td>

                                    {{-- aprobado --}}
                                    <td>
                                        @if ($item->aprobado == true)
                                            <span class="badge rounded-pill bg-success"><i data-feather="user-check"></i></span>
                                        @else
                                            <span class="badge rounded-pill bg-danger"><i data-feather="user-x"></i></span>
                                        @endif
                                    </td>

                                    {{-- leido --}}
                                    <td>
                                        @if ($item->leido == true)
                                            <span class="badge rounded-pill bg-success"><i data-feather="user-check"></i></span>
                                        @else
                                            <span class="badge rounded-pill bg-danger"><i data-feather="user-x"></i></span>
                                        @endif
                                    </td>

                                    {{-- Acción --}}
                                    <td>
                                        <a href="{{ route('admin.comment.reply',$item->id) }}" class="btn btn-inverse-warning">Detalles</a>
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
