@php
    $id = Auth::user()->id;
    $status = Auth::user()->status;
@endphp

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('agent.dashboard') }}" class="sidebar-brand">
            Menu<span>Agente</span>
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
                <a href="{{ route('agent.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Panel</span>
                </a>
            </li>

            {{-- Menus SideBar --}}
            @if ($status === 'active')

                {{-- * Agente Menu --}}
                <li class="nav-item nav-category">Agente</li>
                <li class="nav-item">

                    {{-- Propiedades --}}
                    <a class="nav-link" data-bs-toggle="collapse" href="#propiedad" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="anchor"></i>
                        <span class="link-title">Propiedades</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    {{-- Submenus - Todas las Propiedades --}}
                    <div class="collapse" id="propiedad">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.all.property') }}" class="nav-link">Todas las Propiedades</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.add.property') }}" class="nav-link">Añadir Propiedad</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Titulo de Menu - Editar Datos de Perfil --}}
                    <a class="nav-link" data-bs-toggle="collapse" href="#perfil" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Perfil Agente</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    {{-- Submenus - Editar Perfil, Cambiar Contraseña, Lista, Cerrar Sesión --}}
                    <div class="collapse" id="perfil">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.profile') }}" class="nav-link">Editar Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.change.password') }}" class="nav-link">Cambiar Contraseña</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.logout') }}" class="nav-link">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>

                </li>


                {{-- Comprar paquete --}}
                <li class="nav-item">
                    <a href="{{ route('buy.package') }}" class="nav-link">
                        {{-- <i class="link-icon" data-feather="calendar"></i> --}}
                        <i data-feather="package"></i>
                        <span class="link-title">Comprar Paquete</span>
                    </a>
                </li>

                {{-- Historial de Compras de Paquetes o Pagos --}}
                <li class="nav-item">
                    <a href="{{ route('package.history') }}" class="nav-link">
                        <i data-feather="book-open"></i>
                        <span class="link-title">Historial de Compras</span>
                    </a>
                </li>

                {{-- Ver mensajes que nos han enviado desde resources/views/frontend/property/property_details.blade.php --}}
                <li class="nav-item">
                    <a href="{{ route('agent.property.message') }}" class="nav-link">
                        <i data-feather="mail"></i>
                        <span class="link-title">Ver Mensajes</span>
                    </a>
                </li>

                {{-- * Agent Logout --}}
                <li class="nav-item">
                    <a href="{{ route('agent.logout') }}" class="nav-link">
                        <i data-feather="log-out"></i>
                        <span class="link-title">Cerrar Sesión</span>
                    </a>
                </li>


                {{-- * COMPONENTS --}}
                <li class="nav-item nav-category">Components</li>

                {{-- UI Kit --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                        aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">UI Kit</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
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


            @else

            @endif

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
