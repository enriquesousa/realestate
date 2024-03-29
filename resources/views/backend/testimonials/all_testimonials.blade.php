@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.testimonial') }}" class="btn btn-inverse-info">Añadir un Testimonial</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Todos los Testimoniales</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>

                                <tr>
                                    <th>Serie</th>
                                    <th>Nombre</th>
                                    <th>Posición</th>
                                    <th>Imagen</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($testimonials as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="" style="width:70px; height:70px;"></td>

                                    <td>

                                        @if (Auth::user()->can('edit.testimonials'))
                                            <a href="{{ route('edit.testimonial',$item->id) }}" class="btn btn-inverse-warning">Editar</a>
                                        @endif

                                        @if (Auth::user()->can('delete.testimonials'))
                                            <a href="{{ route('delete.testimonial',$item->id) }}" class="btn btn-inverse-danger" id="delete">Eliminar</a>
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
