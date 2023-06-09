{{-- Llamado por: AllBlogCategory en app/Http/Controllers/Backend/BlogController.php  --}}

@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Añadir Categoría
            </button>

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
                                    <td>

                                        <!-- Button trigger modal -->
                                        {{-- <button type="button" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#catEdit" id="{{ $item->id }}" onclick="categoryEdit(this.id)">
                                            Editar
                                        </button> --}}

                                        {{-- trigger modal - Edit --}}
                                        <a href="" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#catEdit" id="{{ $item->id }}" onclick="categoryEdit(this.id)" title="Editar"><i data-feather="edit"></i></a>

                                        {{-- delete --}}
                                        <a href="{{ route('delete.blog.category',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Eliminar"><i data-feather="trash-2"></i></a>

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

<!-- Modal - para Añadir Categoría -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('store.blog.category') }}" class="forms-sample">
                @csrf

                    {{-- Nombre Categoría Blog --}}
                    <div class="form-group mb-3">
                        <label for="category_name" class="form-label">Nombre</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal - para botón Editar -->
<div class="modal fade" id="catEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('update.blog.category') }}" class="forms-sample">
                @csrf

                    <input type="hidden" name="cat_id" id="cat_id">

                    {{-- Nombre Categoría Blog --}}
                    <div class="form-group mb-3">
                        <label for="category_name" class="form-label">Nombre</label>
                        <input type="text" name="category_name" class="form-control" id="cat_name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    function categoryEdit(id) {

        $.ajax({
            type: "GET",
            url: '/blog/category/'+id,
            dataType: "json",

            success: function(data){
                // console.log(data) // solo me funciona en Chrome

                // Capturar los datos en las variables #cat_name y #cat_id
                $('#cat_name').val(data.category_name);
                $('#cat_id').val(data.id);
            }
        });

    }

</script>


@endsection
