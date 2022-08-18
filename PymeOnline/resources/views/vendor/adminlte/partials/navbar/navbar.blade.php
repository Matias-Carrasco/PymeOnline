<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        {{-- User menu link --}}
        @if(Auth::user())
            @if(config('adminlte.usermenu_enabled'))
                {{-- @include('adminlte::partials.navbar.menu-item-dropdown-user-menu') --}}
                
                @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

                @if (config('adminlte.use_route_url', false))
                    @php( $logout_url = $logout_url ? route($logout_url) : '' )
                @else
                    @php( $logout_url = $logout_url ? url($logout_url) : '' )
                @endif
                
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-power-off text-red"></i>
                        {{ __('adminlte::adminlte.log_out') }}
                    </a>
                    <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                        @if(config('adminlte.logout_method'))
                            {{ method_field(config('adminlte.logout_method')) }}
                        @endif
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @else
   
       
        <li class="nav-item">
            <a class="nav-link"  href="\login">
                <i class="fa fa-fw fa-power-off text-green"></i>
                Iniciar sesión
            </a>
        </li>

        
        @endif

        {{-- Right sidebar toggler link --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>

</nav>
