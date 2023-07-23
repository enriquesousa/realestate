<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            Menu<span>Admin</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            {{-- * Main - Paneles --}}
            <li class="nav-item nav-category">Paneles</li>

            {{-- Panel Admin --}}
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Panel Admin</span>
                </a>
            </li>

            {{-- Pagina Principal --}}
            <li class="nav-item">
                <a href="{{ route('casa') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Pagina Principal</span>
                </a>
            </li>

            {{-- * Admin Menu --}}
            <li class="nav-item nav-category">Admin Propiedades</li>

            {{-- spatie Auth::user()->can() es un método para permitir el acceso según permisos de spatie --}}

            {{-- Tipos de Propiedad - type.menu --}}
            @if (Auth::user()->can('type.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#tipos" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Tipos de Propiedad</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="tipos">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.type'))
                                <li class="nav-item">
                                    <a href="{{ route('all.type') }}" class="nav-link">Lista</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.type'))
                                <li class="nav-item">
                                    <a href="{{ route('add.type') }}" class="nav-link">Añadir un tipo</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

            {{-- Estados --}}
            @if (Auth::user()->can('state.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="map-pin"></i>
                        <span class="link-title">Estados</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="state">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.state'))
                                <li class="nav-item">
                                    <a href="{{ route('all.state') }}" class="nav-link">Lista</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.state'))
                                <li class="nav-item">
                                    <a href="{{ route('add.state') }}" class="nav-link">Añadir Estado</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

            {{-- Comodidades, amenities --}}
            @if (Auth::user()->can('amenities.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="layers"></i>
                        <span class="link-title">Comodidades</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="amenities">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.amenities'))
                                <li class="nav-item">
                                    <a href="{{ route('all.amenities') }}" class="nav-link">Lista</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.amenities'))
                                <li class="nav-item">
                                    <a href="{{ route('add.amenities') }}" class="nav-link">Añadir</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

            {{-- Propiedades --}}
            @if (Auth::user()->can('property.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="map"></i>
                        <span class="link-title">Propiedades</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="property">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.property'))
                                <li class="nav-item">
                                    <a href="{{ route('all.property') }}" class="nav-link">Lista</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.property'))
                                <li class="nav-item">
                                    <a href="{{ route('add.property') }}" class="nav-link">Añadir</a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </li>
            @endif


            {{-- * Historial de Pagos --}}
            @if (Auth::user()->can('pagos.menu'))
                <li class="nav-item">
                    <a href="{{ route('admin.package.history') }}" class="nav-link">
                        {{-- <i data-feather="book-open"></i> --}}
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">Historial de Pagos</span>
                    </a>
                </li>
            @endif

            {{-- * Ver Mensajes de las Propiedades --}}
            @if (Auth::user()->can('mensajes.menu'))
                <li class="nav-item">
                    <a href="{{ route('admin.property.message') }}" class="nav-link">
                        {{-- <i data-feather="mail"></i> --}}
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Ver Mensajes</span>
                    </a>
                </li>
            @endif


            {{-- * FUNCIONES DEL SISTEMA --}}
            <li class="nav-item nav-category">Admin Sistema</li>

            {{-- Agentes --}}
            @if (Auth::user()->can('agente.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                        aria-controls="uiComponents">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Agentes</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.agente'))
                                <li class="nav-item">
                                    <a href="{{ route('all.agent') }}" class="nav-link">Todos</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.agente'))
                                <li class="nav-item">
                                    <a href="{{ route('add.agent') }}" class="nav-link">Añadir</a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </li>
            @endif

            {{-- Usuarios --}}
            @if (Auth::user()->can('usuarios.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#usuarios" role="button" aria-expanded="false"
                        aria-controls="uiComponents">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Usuarios</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="usuarios">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a href="{{ route('admin.all.users') }}" class="nav-link">Lista</a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif

            {{-- Testimoniales --}}
            @if (Auth::user()->can('testimonials.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#testimonials" role="button" aria-expanded="false"
                        aria-controls="uiComponents">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Testimoniales</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="testimonials">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.testimonials'))
                                <li class="nav-item">
                                    <a href="{{ route('all.testimonials') }}" class="nav-link">Lista</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.testimonials'))
                                <li class="nav-item">
                                    <a href="{{ route('add.testimonial') }}" class="nav-link">Añadir Testimonial</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

            {{-- Perfil Admin --}}
            @if (Auth::user()->can('testimonials.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#perfil" role="button" aria-expanded="false"
                        aria-controls="uiComponents">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Perfil Admin</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="perfil">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('edit.perfil'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.profile') }}" class="nav-link">Editar Perfil</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('cambiarpassword.perfil'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.change.password') }}" class="nav-link">Cambiar Contraseña</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{ route('admin.logout') }}" class="nav-link">Cerrar Sesión</a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif


            {{-- Noticias - Blog --}}
            @if (Auth::user()->can('post.menu'))
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Noticias - Blog</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="post">
                    <ul class="nav sub-menu">

                        @if (Auth::user()->can('all.post'))
                            <li class="nav-item">
                                <a href="{{ route('all.post') }}" class="nav-link">Noticias</a>
                            </li>
                        @endif

                        @if (Auth::user()->can('add.post'))
                            <li class="nav-item">
                                <a href="{{ route('add.post') }}" class="nav-link">Añadir Noticia</a>
                            </li>
                        @endif

                        @if (Auth::user()->can('categorias.menu'))
                            <li class="nav-item">
                                <a href="{{ route('all.blog.category') }}" class="nav-link">Categorías</a>
                            </li>
                        @endif

                        @if (Auth::user()->can('comentarios.menu'))
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.comments') }}" class="nav-link">Comentarios</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </li>
            @endif


            {{-- System Settings --}}
            @if (Auth::user()->can('config.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#settings" role="button" aria-expanded="false"
                        aria-controls="uiComponents">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Configuración</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="settings">

                        @if (Auth::user()->can('smtp.setting'))
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('smtp.setting') }}" class="nav-link">Config. SMTP</a>
                                </li>
                            </ul>
                        @endif

                        @if (Auth::user()->can('site.setting'))
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('site.setting') }}" class="nav-link">Config. Sitio</a>
                                </li>
                            </ul>
                        @endif

                    </div>
                </li>
            @endif


            {{-- * ROLES Y PERMISOS DEL SISTEMA --}}
            <li class="nav-item nav-category">Roles y Permisos</li>

            {{-- Roles y Permisos --}}
            @if (Auth::user()->can('rolesypermisos.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#rolesPermissions" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="key"></i>
                        <span class="link-title">Roles y Permisos</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="rolesPermissions">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.permiso'))
                                <li class="nav-item">
                                    <a href="{{ route('all.permission') }}" class="nav-link">Lista Permisos</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('all.rol'))
                                <li class="nav-item">
                                    <a href="{{ route('all.roles') }}" class="nav-link">Lista Roles</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('asignar.rolesypermisos'))
                                <li class="nav-item">
                                    <a href="{{ route('add.roles.permission') }}" class="nav-link">Asignar Rol con Permisos</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('lista.rolesypermisos'))
                                <li class="nav-item">
                                    <a href="{{ route('all.roles.permission') }}" class="nav-link">Lista Roles y Permisos</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

            {{-- Config Administradores --}}
            @if (Auth::user()->can('configadmins.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#configAdmins" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="key"></i>
                        <span class="link-title">Config Admins</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="configAdmins">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('all.configadmins'))
                                <li class="nav-item">
                                    <a href="{{ route('all.admin') }}" class="nav-link">Lista Admins</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('add.configadmins'))
                                <li class="nav-item">
                                    <a href="{{ route('add.admin') }}" class="nav-link">Agregar Admin</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

            {{-- * Sistema Admin y Ayuda --}}
            <li class="nav-item nav-category">Sistema Admin</li>

            {{-- Documentación --}}
            <li class="nav-item">
                {{-- si queremos que se abar en otra ventana agregar target="_blank" --}}
                <a href="{{ route('admin.docs') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">Documentación</span>
                </a>
            </li>

            {{-- * Admin Logout --}}
            <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="nav-link">
                    {{-- <i data-feather="log-out"></i> --}}
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Cerrar Sesión</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
<!-- partial -->
