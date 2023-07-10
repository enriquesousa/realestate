{{-- Llamado de: resources/views/dashboard.blade.php  --}}

{{-- Menu del sidebar --}}
<div class="widget-content">

    <ul class="category-list ">


        @if ($userData->role == 'admin')
            <li class="current"> <a href="{{ route('admin.dashboard') }}"><i class="fab fa fa-envelope "></i> Panel</a></li>
        @endif

        @if ($userData->role == 'agent')
            <li class="current"> <a href="{{ route('agent.dashboard') }}"><i class="fab fa fa-envelope "></i> Panel</a></li>
        @endif

        @if ($userData->role == 'user')
            <li class="current"> <a href="{{ route('dashboard') }}"><i class="fab fa fa-envelope "></i> Panel</a></li>
        @endif


        <li><a href="{{ route('user.profile') }}"><i class="fa fa-cog" aria-hidden="true"></i> Configuración</a></li>

        <li><a href="blog-details.html"><i class="fa fa-credit-card" aria-hidden="true"></i> Buy credits<span class="badge badge-info">(10 credits)</span></a></li>

        <li><a href="{{ route('user.compare') }}"><i class="fa fa-list-alt" aria-hidden="true"></i></i> Comparativo</a></li>

        <li><a href="{{ route('user.wishlist') }}"><i class="fa fa-indent" aria-hidden="true"></i> Lista de Deseos</a></li>

        <li><a href="{{ route('user.change.password') }}"><i class="fa fa-key" aria-hidden="true"></i> Cambiar Contraseña</a></li>

        <li><a href="{{ route('user.logout') }}"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Cerrar Sesión</a></li>

    </ul>

</div>
