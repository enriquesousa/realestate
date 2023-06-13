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

                {{-- * Menus para Agente, Propiedades --}}
                <li class="nav-item nav-category">Agente</li>
                <li class="nav-item">
                    {{-- Propiedades --}}
                    <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Propiedades</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="property">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.all.property') }}" class="nav-link">Todas las Propiedades</a>
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
