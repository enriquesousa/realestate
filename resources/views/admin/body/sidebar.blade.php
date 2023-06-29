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

            {{-- Main --}}
            <li class="nav-item nav-category">Menu Principal</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Panel</span>
                </a>
            </li>

            {{-- * Admin Menu --}}
            <li class="nav-item nav-category">Admin</li>
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
                <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false"
                    aria-controls="emails">
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

                {{-- Titulo de Menu - Propiedades --}}
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

                {{-- Titulo de Menu - Editar Datos de Perfil --}}
                <a class="nav-link" data-bs-toggle="collapse" href="#perfil" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Perfil Admin</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- Submenus - Editar Perfil, Cambiar Contraseña, Lista, Cerrar Sesión --}}
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

            {{-- * Historial de Pagos --}}
            <li class="nav-item">
                <a href="{{ route('admin.package.history') }}" class="nav-link">
                    {{-- <i class="link-icon" data-feather="calendar"></i> --}}
                    <i data-feather="book-open"></i>
                    <span class="link-title">Historial de Pagos</span>
                </a>
            </li>

            {{-- * Mensajes de las Propiedades --}}
            <li class="nav-item">
                <a href="{{ route('admin.property.message') }}" class="nav-link">
                    <i data-feather="mail"></i>
                    <span class="link-title">Ver Mensajes</span>
                </a>
            </li>



            {{-- * COMPONENTS --}}
            <li class="nav-item nav-category">Funciones para Usuario</li>

            {{-- Agentes --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
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

            {{-- Advanced UI --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false"
                    aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- * DOCS --}}
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
<!-- partial -->
