@php
    // Recuperamos datos de site settings de la tabla 'site_settings'
    $settings = App\Models\SiteSetting::find(1);
@endphp

<!-- partial:partials/_footer.html -->
<footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">{{ $settings->copyright }}<a href="{{ $settings->company_webpage }}" target="_blank">&nbsp;&nbsp; | &nbsp; {{ $settings->company_name }}</a>.
    </p>
    <p class="text-muted">Hecho con <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>
<!-- partial -->
