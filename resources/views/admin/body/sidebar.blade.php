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

            {{-- Main - Menu Principal Panel Admin --}}
            <li class="nav-item nav-category">Menu Principal</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Panel Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('casa') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Pagina Principal</span>
                </a>
            </li>

            {{-- * Admin Menu --}}
            <li class="nav-item nav-category">Admin Propiedades</li>
            <li class="nav-item">

                {{-- Tipos de Propiedad --}}
                <a class="nav-link" data-bs-toggle="collapse" href="#tipos" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Tipos de Propiedad</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- Submenus - Lista, Añadir un tipo --}}
                <div class="collapse" id="tipos">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.type') }}" class="nav-link">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.type') }}" class="nav-link">Añadir un tipo</a>
                        </li>
                    </ul>
                </div>

                {{-- Estados --}}
                <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="map-pin"></i>
                    <span class="link-title">Estados</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- Submenus --}}
                <div class="collapse" id="state">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.state') }}" class="nav-link">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.state') }}" class="nav-link">Añadir Estado</a>
                        </li>
                    </ul>
                </div>

                {{-- Comodidades, amenities --}}
                <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Comodidades</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- Submenus - Lista, Añadir --}}
                <div class="collapse" id="amenities">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.amenities') }}" class="nav-link">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.amenities') }}" class="nav-link">Añadir</a>
                        </li>
                    </ul>
                </div>

                {{-- Propiedades --}}
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="map"></i>
                    <span class="link-title">Propiedades</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- Submenus - Lista, Añadir --}}
                <div class="collapse" id="property">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.property') }}" class="nav-link">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.property') }}" class="nav-link">Añadir</a>
                        </li>
                    </ul>
                </div>

            </li>

            {{-- * Historial de Pagos --}}
            <li class="nav-item">
                <a href="{{ route('admin.package.history') }}" class="nav-link">
                    {{-- <i data-feather="book-open"></i> --}}
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Historial de Pagos</span>
                </a>
            </li>

            {{-- * Ver Mensajes de las Propiedades --}}
            <li class="nav-item">
                <a href="{{ route('admin.property.message') }}" class="nav-link">
                    {{-- <i data-feather="mail"></i> --}}
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Ver Mensajes</span>
                </a>
            </li>


            {{-- * FUNCIONES DEL SISTEMA --}}
            <li class="nav-item nav-category">Admin Sistema</li>

            {{-- Agentes --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Agentes</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.agent') }}" class="nav-link">Todos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.agent') }}" class="nav-link">Añadir</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Usuarios --}}
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
                        <li class="nav-item">
                            <a href="#" class="nav-link">Añadir</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Testimoniales --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#testimonials" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Testimoniales</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="testimonials">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.testimonials') }}" class="nav-link">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.state') }}" class="nav-link">Añadir Testimonial</a>
                        </li>
                    </ul>
                </div>
            </li>

             {{-- Perfil Admin --}}
             <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#perfil" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Perfil Admin</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="perfil">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.profile') }}" class="nav-link">Editar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.change.password') }}" class="nav-link">Cambiar Contraseña</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.logout') }}" class="nav-link">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- Noticias - Blog --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Noticias - Blog</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="post">

                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('all.post') }}" class="nav-link">Noticias</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('add.post') }}" class="nav-link">Añadir Noticia</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('all.blog.category') }}" class="nav-link">Categorías</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.blog.comments') }}" class="nav-link">Comentarios</a>
                        </li>

                    </ul>

                </div>
            </li>

            {{-- System Settings --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#settings" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Configuración</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="settings">

                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('smtp.setting') }}" class="nav-link">Config. SMTP</a>
                        </li>
                    </ul>

                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('site.setting') }}" class="nav-link">Config. Sitio</a>
                        </li>
                    </ul>

                </div>
            </li>


            {{-- * ROLES Y PERMISOS DEL SISTEMA --}}
            <li class="nav-item nav-category">Roles y Permisos</li>

            {{-- Roles y Permisos --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#rolesypermisos" role="button" aria-expanded="false"
                    aria-controls="rolesypermisos">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">Roles y Permisos</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="rolesypermisos">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.permission') }}" class="nav-link">Lista Permisos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.roles') }}" class="nav-link">Lista Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.roles.permission') }}" class="nav-link">Asignar Rol con Permisos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.roles.permission') }}" class="nav-link">Lista Roles y Permisos</a>
                        </li>
                    </ul>
                </div>
            </li>


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
