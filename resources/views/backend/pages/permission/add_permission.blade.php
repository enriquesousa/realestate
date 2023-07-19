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

                        <h6 class="card-title text-warning">Añadir Permiso</h6>

                        <form id="myForm" method="POST" action="{{ route('store.permission') }}" class="forms-sample">
                        @csrf



                            {{-- Nombre Permiso --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" autofocus>
                            </div>

                            {{-- Grupo Select Permiso --}}
                            <div class="form-group mb-3">
                                <label for="group_name" class="form-label">Grupo</label>
                                <select name="group_name" class="form-select"
                                    id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Seleccionar Grupo</option>
                                    <option value="type">Tipos de Propiedad</option>
                                    <option value="state">Estados</option>
                                    <option value="amenities">Comodidades</option>
                                    <option value="user">Usuarios</option>
                                    <option value="property">Propiedades</option>
                                    <option value="testimonials">Testimoniales</option>
                                    <option value="perfil">Perfil</option>
                                    <option value="history">Historial de Pagos</option>
                                    <option value="message">Ver Mensajes</option>
                                    <option value="agent">Agentes</option>
                                    <option value="category">Categorías Noticias</option>
                                    <option value="post">Lista Noticias</option>
                                    <option value="comment">Comentarios Noticias</option>
                                    <option value="smtp">Configuración SMTP</option>
                                    <option value="site">Configuración Sitio</option>
                                    <option value="role">Roles y Permisos</option>
                                </select>
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
