@extends('admin.app')

@section('content')

<header class="flex border-b">
    <div class="wrapper flex-center">
        <h2>Teksty</h2>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul id="main-navbar" class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'home') }}">Strona główna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'o-nas') }}">O nas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Oferta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-page', 'centrum-leczenia-otylosci') }}">Centrum Leczenia Otyłości</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'poradnia-chorob-watroby') }}">Poradnia Chorób Wątroby Hepatolodzy</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'poradnia-medycyny-podrozy') }}">Poradnia Medycyny Podróży Medellan</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'pracownia-endoskopii') }}">Pracownia Endoskopii</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'gastroskopia') }}">Pracownia Endoskopii | Gastroskopia</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'kolonoskopia') }}">Pracownia Endoskopii | Kolonoskopia</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'badania-kliniczne') }}">Badania Kliniczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'diagnostyka-obrazowa') }}">Diagnostyka Obrazowa</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'badania-laboratoryjne') }}">Badania Laboratoryjne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'leczenie-biologiczne') }}">Leczenie Biologiczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'szkolenia') }}">Szkolenia</a></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'specjalizacje') }}">Specjalizacje</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'zespol') }}">Zespół</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Strefa Pacjenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-page', 'rejestracja') }}">Rejestracja</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'grafik-przyjec') }}">Grafik Przyjęć</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'cennik-konsultacji') }}">Cennik Konsultacji</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'cennik-badan-laboratoryjnych') }}">Cennik Badań Laboratoryjnych</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'pakiety-laboratoryjne') }}">Pakiety Laboratoryjne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'cennik-zabiegow') }}">Cennik Zabiegów</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'do-pobrania') }}">Do pobrania</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'czesto-zadawane-pytania') }}">FAQ</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'polityka-prywatnosci') }}">Polityka Prywatności</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-page', 'aktualnosci') }}">Aktualności</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-page', 'kontakt') }}">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@livewire('pages', ['page' => $page])

@endsection