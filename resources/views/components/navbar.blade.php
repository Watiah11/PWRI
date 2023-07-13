<nav class="navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand d-flex gap-3 align-items-center company" href="/" style="margin-right: 1rem;">
      <img src="{{ asset('assets_landing/icon/digikop.png') }}" alt="Logo" width="60rem" height="20%" class="d-inline-block align-text-top">
    <div class="font-weight-bold company">DigiKop PWRI</div>
    </a>
    <!-- <img class="img-fluid logo-collapse mr-5" src="{{ asset('assets_landing/logo.png') }}" alt="logo" width="40" height="40"> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M4 6l16 0"></path>
   <path d="M4 12l16 0"></path>
   <path d="M4 18l16 0"></path>
</svg>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav navbar-component gap-lg-3 gap-md-3">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::is('home') ? 'active' : ''}}">Home</a>
            <a href="{{ route('layanan.index') }}" class="nav-item nav-link {{ Route::is(['layanan.index','top-up.index','penarikan.index','riwayat.index']) ? 'active' : ''}}">Layanan</a>
            <a href="{{ route('about') }}" class="nav-item nav-link  {{ Route::is('about') ? 'active' : ''}}">Tentang Kami</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link {{ Route::is('contact') ? 'active' : '' }}">Kontak</a>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center gap-3 ms-auto profile-avatar">
        <div class="notification">
            <img src="{{ asset('assets_landing/icon/Vector.svg') }}" alt="notification">
        </div>
        <div class="profile dropdown" style="cursor: pointer;">
            @if (Session::get('Photo') != null)
                <img src="{{ 'https://pwriapi-stg.netzme.com/' . Session::get('Photo') }}" alt="avatar" class="avatar dropdown-toggle rounded-circle" data-toggle="dropdown" height="40" width="40">
            @else
                <img src="{{ asset('assets_landing/icon/avatars-default.jpg') }}" alt="avatar" class="avatar dropdown-toggle rounded-circle" height="60px" data-toggle="dropdown">
            @endif
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
