{{-- Llamado de: resources/views/dashboard.blade.php  --}}

{{-- Menu del sidebar --}}
<div class="widget-content">

    <ul class="category-list ">

        <li class="current"> <a href="{{ route('dashboard') }}"><i class="fab fa fa-envelope "></i> Panel</a></li>

        <li><a href="{{ route('user.profile') }}"><i class="fa fa-cog" aria-hidden="true"></i> Configuración</a></li>

        <li><a href="blog-details.html"><i class="fa fa-credit-card" aria-hidden="true"></i> Buy credits<span class="badge badge-info">(10 credits)</span></a></li>

        <li><a href="blog-details.html"><i class="fa fa-list-alt" aria-hidden="true"></i></i> Properties</a></li>

        <li><a href="{{ route('user.wishlist') }}"><i class="fa fa-indent" aria-hidden="true"></i> Lista de Deseos</a></li>

        <li><a href="{{ route('user.change.password') }}"><i class="fa fa-key" aria-hidden="true"></i> Cambiar Contraseña</a></li>

        <li><a href="{{ route('user.logout') }}"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Cerrar Sesión</a></li>

    </ul>

</div>
