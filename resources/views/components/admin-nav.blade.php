<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid nav-flex">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('admin') ? 'active' : '' }}" aria-current="page" href="{{ route('admin') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="{{request()->routeIs('admin.zespol*') ? 'active' : '' }} nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">Zespół</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('admin-experts') }}">Specjaliści</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-employees') }}">Personel</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-recommendations') }}">Rekomendacje</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="{{request()->routeIs('admin-specialties') ? 'active' : ''}} nav-link" href="{{ route('admin-specialties') }}">Specjalizacje</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{request()->routeIs('admin-news') ? 'active' : '' }} nav-link" href="{{ route('admin-news') }}">Aktualności</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                            Cenniki
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('admin-lab-tests') }}">Badania laboratoryjne</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-consultations') }}">Konsultacje</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-lab-packages') }}">Pakiety laboratoryjne i diagnostyczne</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-treatments') }}">Zabiegi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="{{request()->routeIs('admin-text') ? 'active' : '' }} nav-link" href="{{ route('admin-text') }}">Teksty</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">Inne</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('admin-clinical-trials') }}">Badania kliniczne</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-faq') }}">FAQ</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-files') }}">Do pobrania</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-pictures') }}">Obrazy</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin-contact') }}">Kontakt</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false"> {{ $LoggedUserInfo['name'] }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Wyloguj</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>