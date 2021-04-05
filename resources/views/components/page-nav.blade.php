<nav class="page-navbar">
    <div class="nav-contact">
            <p><span><i class="icon-phone"></i><a href="tel:+{{ $contact->phone }}"> {{ $contact->phone }}</a></p>
    </div>
    <div class="logo-container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{url('storage/photos/logo-grad.png')}}" />
        </a>
        <div class="menu-btn">Menu</div>
    </div>
    <ul class="menu-container">
        <li><a href="{{ route('about') }}">O nas</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Oferta<i class="bi bi-chevron-down"></i></a>
            <ol class="dropdown-content">
                <li><a href="{{ url('/oferta/centrum-leczenia-otylosci') }}">Centrum Leczenia Otyłości</a></li>
                <li><a href="{{ url('/oferta/poradnia-chorob-watroby') }}">Poradnia Chorób Wątroby</a></li>
                <li><a href="{{ url('/oferta/poradnia-medycyny-podrozy') }}">Poradnia Medycyny Podróży</a></li>
                <li><a href="{{ url('/oferta/pracownia-endoskopii') }}">Pracownia Endoskopii</a></li>
                <li><a href="{{ url('/oferta/badania-kliniczne') }}">Badania Kliniczne</a></li>
                <li><a href="{{ url('/oferta/diagnostyka-obrazowa') }}">Diagnostyka Obrazowa</a></li>
                <li><a href="{{ url('/oferta/badania-laboratoryjne') }}">Badania Laboratoryjne</a></li>
            </ol>
        </li>
        <li><a href="{{ route('specialties') }}">Specjalizacje</a></li>
        <li class="mobile-menu-item"><a href="{{ route('clinicalTrials') }}">Badania Kliniczne</a></li>
        <li><a href="{{ route('team') }}">Zespół</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Strefa Pacjenta<i class="bi bi-chevron-down"></i></a>
            <ol class="dropdown-content">
                <li><a href="{{ url('/strefa-pacjenta/rejestracja') }}">Rejestracja</a></li>
                <li><a href="{{ url('/strefa-pacjenta/grafik-przyjec') }}">Grafik Przyjęć</a></li>
                <li><a href="{{ url('/strefa-pacjenta/cennik-konsultacji') }}">Cennik Konsultacji</a></li>
                <li><a href="{{ url('/strefa-pacjenta/cennik-badan-laboratoryjnych') }}">Cennik badań Laboratoryjnych</a></li>
                <li><a href="{{ url('/strefa-pacjenta/pakiety-laboratoryjne') }}">Pakiety Laboratoryjne</a></li>
                <li><a href="{{ url('/strefa-pacjenta/cennik-zabiegow') }}">Cennik Zabiegów</a></li>
                <li><a href="{{ url('/strefa-pacjenta/do-pobrania') }}">Do pobrania</a></li>
                <li><a href="{{ url('/strefa-pacjenta/czesto-zadawane-pytania') }}">FAQ</a></li>
                <li><a href="">Wyniki on-line</a></li>
                <li><a href="{{ url('/strefa-pacjenta/polityka-prywatnosci') }}">Polityka Prywatności</a></li>
            </ol>
        </li>
        <li><a href="{{ route('news') }}">Aktualności</a></li>
        <li><a href="{{ route('contact') }}">Kontakt</a></li>
        @if($contact->online_registration)
        <li class="online-reg"><a href="{{ $contact->online_registration }}">Zapisy on-line</a></li>
        @endif
    </ul>      
</nav>