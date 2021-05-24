<footer>
    <section class="footer-contact">
        <header class="basic-s border-b">
            <div class="header-content">
                <h3>Kontakt</h3>
            </div>
        </header>
        <div class="section-body">
        <ul>
            <li>
                <picture>
                <img width="40px" src="{{url('storage/img/icon-location.png')}}">
                </picture>
                <p>{{ $footer->street }}</p>
                <p>{{ $footer->city }}</p>
            </li>
            <li>
                <picture>
                    <img width="40px" src="{{url('storage/img/icon-clock.png')}}">
                </picture>
                <p>Pon.- Pt. {{ $footer->open_week }}</p>
                <p>Sb. {{ $footer->open_sat }}</p>
            </li>
            <li>
                <picture>
                <img width="40px" src="{{url('storage/img/icon-phone.png')}}">
                </picture>
                <p><a class="footer-phone-number" href="tel:+{{ $footer->phone }}">{{ $footer->phone }}</a></p>
            </li>
            <li>
                <picture>
                <img width="40px" src="{{url('storage/img/icon-mail.png')}}">
                </picture>
                <p>{{ $footer->email }}</p>
            </li>
        </ul>
        </div>
    </section>
    <nav class="footer-nav">
        <ul>
            <li>
                <a href="{{ url('/oferta/diagnostyka-obrazowa') }}">Diagnostyka Obrazowa</a>
                <a href="{{ url('/oferta/badania-laboratoryjne') }}">Badania Laboratoryjne</a>
                <a href="{{ url('/oferta/pracownia-endoskopii') }}">Pracownia Endoskopii</a>
                <a href="{{ url('/oferta/centrum-leczenia-otylosci') }}">Centrum Leczenia Otyłości</a>
                <a href="{{ url('/oferta/poradnia-chorob-watroby') }}">Poradnia Chorób Wątroby</a>
                <a href="{{ url('/oferta/poradnia-medycyny-podrozy') }}">Poradnia Medycyny Podróży</a>
                <a href="{{ url('/oferta/badania-kliniczne') }}">Badania Kliniczne</a>
                <a href="{{ url('/oferta/leczenie-biologiczne') }}">Leczenie Biologiczne</a>
                <a href="{{ url('/oferta/szkolenia') }}">Szkolenia</a>
            </li>            
            <li>
                <a href="{{ url('/oferta/specjalizacje') }}">Specjalizacje</a>
                <a href="{{ url('/o-nas') }}">O nas</a>
                <a href="{{ url('/zespol') }}">Zespół</a>
                <a href="{{ url('/aktualnosci') }}">Aktualności</a>
                <a href="{{ url('/kontakt') }}">Kontakt</a>
            </li>
            <li>
                @if($footer->online_registration)
                <a href="{{$footer->online_registration}}" rel="nofollow">Zapisy on-line</a>
                @endif
                
                @if($footer->online_test_results)
                <a href="{{$footer->online_test_results}}" rel="nofollow">Wyniki on-line</a>
                @endif

                <a href="{{ url('/strefa-pacjenta/czesto-zadawane-pytania') }}">FAQ</a>
                <a href="{{ url('/strefa-pacjenta/polityka-prywatnosci') }}">Polityka Prywatności</a>
            </li>
        </ul>    
    </nav>
    <p class="copyright">&copy; {{ date("Y") }} BodyClinic</p>
 </footer>