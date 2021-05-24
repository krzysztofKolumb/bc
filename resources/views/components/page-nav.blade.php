<nav class="page-navbar">
    <div class="nav-contact">
            <!-- <p><a href="https://www.facebook.com/przychodnia.bodyclinic/" target="_blank"><img src="{{url('storage/img/icon-fb.png')}}" /></a></p>
            <p><a href="https://www.instagram.com/bodyclinic_przychodnia/" target="_blank"><img src="{{url('storage/img/icon-in1.png')}}" /></a></p>
             -->
            <p><a href="{{ $contact->facebook }}" target="_blank"><img src="{{url('storage/img/icon-fb.png')}}" /></a></p>
            <p><a href="{{ $contact->instagram }}" target="_blank"><img src="{{url('storage/img/icon-in1.png')}}" /></a></p>
            
            <p><i class="icon-phone"></i><a href="tel:+{{ $contact->phone }}"> {{ $contact->phone }}</a></p>
    </div>
    <div class="logo-container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{url('storage/img/logo-grad.png')}}" />
        </a>
        <div class="menu-btn">Menu</div>
    </div>
    <ul class="menu-container">
        <li><a page="about" href="{{ route('about') }}">O nas</a></li>
        <li class="dropdown">
            <a page="offer" href="javascript:void(0)" class="dropbtn">Oferta<i class="icon-down-dir-1"></i></a>
            <ol class="dropdown-content">
                <li><a href="{{ url('/oferta/diagnostyka-obrazowa') }}">Diagnostyka Obrazowa</a></li>
                <li><a href="{{ url('/oferta/badania-laboratoryjne') }}">Badania Laboratoryjne</a></li>
                <li><a href="{{ url('/oferta/pracownia-endoskopii') }}">Pracownia Endoskopii</a></li>
                <li><a href="{{ url('/oferta/centrum-leczenia-otylosci') }}">Centrum Leczenia Otyłości</a></li>
                <li><a href="{{ url('/oferta/poradnia-chorob-watroby') }}">Poradnia Chorób Wątroby Hepatolodzy</a></li>
                <li><a href="{{ url('/oferta/poradnia-medycyny-podrozy') }}">Poradnia Medycyny Podróży Medellan</a></li>
                <li><a href="{{ url('/oferta/badania-kliniczne') }}">Badania Kliniczne</a></li>
                <li><a href="{{ url('/oferta/leczenie-biologiczne') }}">Leczenie Biologiczne</a></li>
                <li><a href="{{ url('/oferta/szkolenia') }}">Szkolenia</a></li>
            </ol>
        </li>
        <li><a page="specialties" href="{{ route('specialties') }}">Specjalizacje</a></li>
        <li><a page="team" href="{{ route('team') }}">Zespół</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" page="patient" class="dropbtn">Strefa Pacjenta<i class="icon-down-dir-1"></i></a>
            <ol class="dropdown-content">
                <li><a href="{{ url('/strefa-pacjenta/rejestracja') }}">Rejestracja</a></li>
                <li><a href="{{ url('/strefa-pacjenta/grafik-przyjec') }}">Grafik Przyjęć</a></li>
                <li><a href="{{ url('/strefa-pacjenta/cennik-konsultacji') }}">Cennik Konsultacji</a></li>
                <li><a href="{{ url('/strefa-pacjenta/cennik-badan-laboratoryjnych') }}">Cennik badań Laboratoryjnych</a></li>
                <li><a href="{{ url('/strefa-pacjenta/pakiety-laboratoryjne') }}">Pakiety Laboratoryjne</a></li>
                <li><a href="{{ url('/strefa-pacjenta/cennik-zabiegow') }}">Cennik Zabiegów</a></li>
                <li><a href="{{ url('/strefa-pacjenta/do-pobrania') }}">Do pobrania</a></li>
                <li><a href="{{ url('/strefa-pacjenta/czesto-zadawane-pytania') }}">FAQ</a></li>
                @if($contact->online_test_results)
                <li><a href="{{$contact->online_test_results}}" rel="nofollow">Wyniki on-line</a></li>
                @endif
                <li><a href="{{ url('/strefa-pacjenta/polityka-prywatnosci') }}">Polityka Prywatności</a></li>
            </ol>
        </li>
        <li><a page="news" href="{{ route('news') }}">Aktualności</a></li>
        <li><a page="contact" href="{{ route('contact') }}">Kontakt</a></li>
        @if($contact->online_registration)
        <li class="online-reg"><a href="{{ $contact->online_registration }}" rel="nofollow">Zapisy on-line</a></li>
        @endif
    </ul>      
</nav>