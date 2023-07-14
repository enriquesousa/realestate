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

                        <h6 class="card-title">Añadir Permiso</h6>

                        <form id="myForm" method="POST" action="{{ route('update.permission') }}" class="forms-sample">
                        @csrf

                            <input type="hidden" name="id" value="{{ $permission->id }}">

                            {{-- Nombre Permiso --}}
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                            </div>

                            {{-- Grupo Permiso --}}
                            <div class="form-group mb-3">
                                <label for="group_name" class="form-label">Grupo</label>
                                <select name="group_name" class="form-select"
                                    id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Seleccionar Grupo</option>
                                    <option value="type" {{ $permission->group_name == 'type' ? 'selected' : '' }}>Tipos de Propiedad</option>
                                    <option value="state" {{ $permission->group_name == 'state' ? 'selected' : '' }}>Estados</option>
                                    <option value="amenities" {{ $permission->group_name == 'amenities' ? 'selected' : '' }}>Comodidades</option>
                                    <option value="user" {{ $permission->group_name == 'user' ? 'selected' : '' }}>Usuarios</option>
                                    <option value="property" {{ $permission->group_name == 'property' ? 'selected' : '' }}>Propiedades</option>
                                    <option value="testimonials" {{ $permission->group_name == 'testimonials' ? 'selected' : '' }}>Testimoniales</option>
                                    <option value="perfil" {{ $permission->group_name == 'perfil' ? 'selected' : '' }}>Perfil</option>
                                    <option value="history" {{ $permission->group_name == 'history' ? 'selected' : '' }}>Historial de Pagos</option>
                                    <option value="message" {{ $permission->group_name == 'message' ? 'selected' : '' }}>Ver Mensajes</option>
                                    <option value="agent" {{ $permission->group_name == 'agent' ? 'selected' : '' }}>Agentes</option>
                                    <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>Categorías Noticias</option>
                                    <option value="post" {{ $permission->group_name == 'post' ? 'selected' : '' }}>Lista Noticias</option>
                                    <option value="comment" {{ $permission->group_name == 'comment' ? 'selected' : '' }}>Comentarios Noticias</option>
                                    <option value="smtp" {{ $permission->group_name == 'smtp' ? 'selected' : '' }}>Configuración SMTP</option>
                                    <option value="site" {{ $permission->group_name == 'site' ? 'selected' : '' }}>Configuración Sitio</option>
                                    <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>Roles y Permisos</option>
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
