<!-- Primary -->
@if(!empty($alert_primary))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ $alert_primary }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_primary'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ Session::get('alert_primary') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Secondary -->
@if(!empty($alert_secondary))
<div class="alert alert-secondary alert-dismissible" role="alert">
    {{ $alert_secondary }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_secondary'))
<div class="alert alert-secondary alert-dismissible" role="alert">
    {{ Session::get('alert_secondary') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Success -->
@if(!empty($alert_success))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ $alert_success }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('alert_success') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Danger -->
@if(!empty($alert_danger))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ $alert_danger }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_danger'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ Session::get('alert_danger') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Warning -->
@if(!empty($alert_warning))
<div class="alert alert-warning alert-dismissible" role="alert">
    {{ $alert_warning }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
    {{ Session::get('alert_warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Info -->
@if(!empty($alert_info))
<div class="alert alert-info alert-dismissible" role="alert">
    {{ $alert_info }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_info'))
<div class="alert alert-info alert-dismissible" role="alert">
    {{ Session::get('alert_info') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Light -->
@if(!empty($alert_light))
<div class="alert alert-light alert-dismissible" role="alert">
    {{ $alert_light }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_light'))
<div class="alert alert-light alert-dismissible" role="alert">
    {{ Session::get('alert_light') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Dark -->
@if(!empty($alert_dark))
<div class="alert alert-dark alert-dismissible" role="alert">
    {{ $alert_dark }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('alert_dark'))
<div class="alert alert-dark alert-dismissible" role="alert">
    {{ Session::get('alert_dark') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif