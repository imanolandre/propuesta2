<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
       aria-label="Open user menu">
                        <span class="avatar avatar-sm"
                              style="background-image: url({{asset('assets/logo-icon.png')}})"></span>
        <div class="d-none d-xl-block ps-3">
            <div>{{Auth()->user()->name}}</div>
            <div class="mt-1 small text-muted">Software Engineer</div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

        @php( $logout_url = View::getSection('logout_url') ?? config('tablar.logout_url', 'logout') )
        @php( $profile_url = View::getSection('profile_url') ?? config('tablar.profile_url', 'profile') )
        @php( $setting_url = View::getSection('setting_url') ?? config('tablar.setting_url', 'setting') )
        <a class="dropdown-item"
           href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off text-red"></i>
            {{ __('Cerrar Sesión') }}
        </a>

        <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
            @if(config('tablar.logout_method'))
                {{ method_field(config('tablar.logout_method')) }}
            @endif
            {{ csrf_field() }}
        </form>

    </div>
</div>
