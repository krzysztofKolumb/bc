@extends('layouts.home')

@section('meta_title')
{{ $home->meta_title }}
@endsection

@section('description')
{{ $home->meta_description }}
@endsection

@section('name')
{{ $home->name }}
@endsection

@section('main')


<div class="home-gallery">
    <ul>
        <li id="home-gallery-img-1">
          <div><a href="{{ route('specialties') }}">Wszystkie specjalizacje</a></div>
        </li>
        <li id="home-gallery-img-2">
          <div><a href="{{ route('offer', 'pracownia-endoskopii') }}">Pracownia Endoskopii</a></div>
        </li>
    </ul>
 </div>

<section class="home-hexgrid">
<header class="basic-s">
        <div class="header-content">
            <h3>Oferta</h3>
            <p>Lorem Ipsum</p>
        </div>
    </header>
    <div class="section-body bcg">

    <header class="basic-a">
                <h3>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz</h3>
                <p>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany w przemyśle elektronicznym, pozostając praktycznie niezmienionym.</p>
            </header>

    <ul class="hexGrid">

    <li class="hex">
        <div class="hexIn">
          <a class="hexLink" href="{{ route('specialties') }}">
              <picture>
              </picture>
              <div id="hex-apple-content" class="hexContent">
                <img class="icon apple" src="{{url('storage/img/icon-spec.png')}}" >
                <h2>Wszystkie specjalizacje</h2>
              </div>
          </a>
        </div>
      </li>

      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'diagnostyka-obrazowa') }}">
              <picture>
              </picture>
            <div class="hexContent">
             <img class="icon diagnostic" src="{{url('storage/img/icon-do.png')}}" >
            <h2>Diagnostyka <br> Obrazowa</h2>
              </div>
          </a>
        </div>
      </li>        
        
      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'badania-laboratoryjne') }}">
              <picture>
              </picture>
            <div class="hexContent">
             <img class="icon lab" src="{{url('storage/img/icon-bl.png')}}" > 
            <h2>Badania<br /> Laboratoryjne</h2>
              </div>
          </a>
        </div>
      </li>

      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'pracownia-endoskopii') }}">
              <picture>
              </picture>
            <div class="hexContent">
             <img class="icon endo" src="{{url('storage/img/icon-pe.png')}}" >
            <h2>Pracownia<br /> Endoskopii</h2>
              </div>
          </a>
        </div>
      </li>    
          
      <li class="hex">
        <div class="hexIn">
          <a class="hexLink" href="{{ route('offer', 'centrum-leczenia-otylosci') }}">
              <picture>
              </picture>
              <div id="hex-apple-content" class="hexContent">
                <img class="icon apple" src="{{url('storage/img/icon-clo.png')}}" >
                <h2>Centrum Leczenia Otyłości</h2>
              </div>
          </a>
        </div>
      </li>
        
      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'poradnia-chorob-watroby') }}">
              <picture>
              </picture>
              <div id="hex-liver-content" class="hexContent">
              <img class="icon liver" src="{{url('storage/img/icon-pcw.png')}}" >
              <h2>Poradnia Chorób Wątroby <span>Hepatolodzy</span></h2>
              </div>
          </a>
        </div>
      </li>
          
        <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'poradnia-medycyny-podrozy') }}">
              <picture>
              </picture>
              <div id="hex-travel-content" class="hexContent">
              <img class="icon travel" src="{{url('storage/img/icon-pmp.png')}}" >
            <h2>Poradnia Medycyny Podróży <span>Medellan</span></h2>
              </div>
          </a>
        </div>
      </li>         
        
      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'badania-kliniczne') }}">
              <picture>
              </picture>
            <div class="hexContent">
            <img class="icon clinical" src="{{url('storage/img/icon-bk.png')}}" > 
            <h2>Badania<br> Kliniczne</h2>
              </div>
          </a>
        </div>
      </li>    
        
      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'leczenie-biologiczne') }}">
              <picture>
              </picture>
            <div class="hexContent">
             <img class="icon diagnostic" src="{{url('storage/img/icon-lb1.png')}}" >
            <h2>Leczenie <br> biologiczne</h2>
              </div>
          </a>
        </div>
      </li>        
        
      <li class="hex">
        <div class="hexIn">
        <a class="hexLink" href="{{ route('offer', 'szkolenia') }}">
              <picture>
              </picture>
            <div class="hexContent">
             <img class="icon lab" src="{{url('storage/img/icon-sz.png')}}" > 
            <h2>Szkolenia</h2>
              </div>
          </a>
        </div>
      </li>     
    </ul>
    </div>
</section>

    <section class="jd-slider slider2">
        <div class="slide-inner">
            <ul class="slide-area">
                <li>
                    <section>
                        <header class="basic-s">
                            <div class="header-content">
                                <h3>{{ $treatments->title }}</h3>
                                @if($team->subtitle)
                                  <p>{{ $treatments->subtitle }}</p>
                                @endif
                            </div>
                        </header>
                        <div id="home-endoscopy" class="section-body">
                            <article>
                                <header class="basic-a">
                                    <h3>{{ $treatments->header }}</h3>
                                    <p>{{ $treatments->content }}</p>
                                </header>
                                <!-- <div class="endo-imgs">
                                  <img width="100%" src="{{url('storage/img/bodyclinic4.jpg')}}">
                                  <img width="100%" src="{{url('storage/img/bodyclinic3.jpg')}}">
                                </div> -->
                                  <ul class="treatments-list">
                                      <li>
                                          <img class="icon-endoscopy" height="85px" src="{{url('storage/img/icon-gastroscopy1.png')}}" >
                                          <div>
                                            <a class="link link-arrow" href="{{ route('endoscopy-treatment', ['gastroskopia'])}}">
                                              <div><p>Gastroskopia</p></div>
                                              <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                                            </a>
                                          </div>
                                      </li>
                                      <li>   
                                        <img class="icon-endoscopy" height="85px" src="{{url('storage/img/icon-colonoscopy1.png')}}" >
                                        <div>
                                              <a class="link link-arrow" href="{{ route('endoscopy-treatment', ['kolonoskopia'])}}">
                                                <div><p>Kolonoskopia</p></div>
                                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                                              </a>
                                          </div>
                                      </li>
                                  </ul>
                            </article>
                        </div>
                    </section>
                </li>
                <li>
                <section>
                    <header class="basic-s">
                        <div class="header-content">
                            <h3>Pracownia USG</h3>
                              <p>Oferta</p>
                        </div>
                    </header>
                    <div class="section-body home-offer">
                        <article>
                            <div class="wrapper-a">
                              <header class="basic-a">
                                  <h3>Diagnostyka Obrazowa</h3>
                                  <p>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym.</p>
                              </header>
                              <a class="link desctop" href="{{ route('offer', 'diagnostyka-obrazowa') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                            </div>
                            <div class="wrapper-b">
                              <ul class="usg-img-list">
                                  <li><img src="{{url('storage/img/bodyclinic-17a.jpg')}}"></li>
                                  <li><img src="{{url('storage/img/bodyclinic-16a.jpg')}}"></li>
                              </ul>
                            </div>
                            <a class="link mobile" href="{{ route('offer', 'diagnostyka-obrazowa') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                        </article>
                    </div>
                </section>
                </li>
                <li>
                <section class="home-offer-slide">
                    <header class="basic-s">
                        <div class="header-content">
                            <h3>Centrum Leczenia Otyłości</h3>
                              <p>Oferta</p>
                        </div>
                    </header>
                    <div id="home-clo" class="section-body home-offer">
                        <article>
                            <div class="wrapper-a">
                              <header class="basic-a">
                                  <h3>Centrum Leczenia Otyłości</h3>
                                  <p>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym.</p>
                              </header>
                              <a class="link desctop" href="{{ route('offer', 'centrum-leczenia-otylosci') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                            </div>
                            <div class="wrapper-b">
                            <ul class="pcw-img-list">
                                  <li><img src="{{url('storage/img/bcg-clo.png')}}"></li> 
                              </ul>
                            </div>
                            <a class="link mobile" href="{{ route('offer', 'centrum-leczenia-otylosci') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                        </article>
                    </div>
                </section>
                </li>
                <!-- <li>
                <section class="home-offer-slide">
                    <header class="basic-s">
                        <div class="header-content">
                            <h3>Poradnia Chorób Wątroby Hepatolodzy</h3>
                              <p>Oferta</p>
                        </div>
                    </header>
                    <div class="section-body home-offer">
                        <article>
                            <div class="wrapper-a">
                              <header class="basic-a">
                                  <h3>Poradnia Chorób Wątroby Hepatolodzy</h3>
                                  <p>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym.</p>
                              </header>
                              <a class="link desctop" href="{{ route('offer', 'poradnia-chorob-watroby') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                            </div>
                            <div class="wrapper-b">
                              <ul class="pcw-img-list">
                                  <li><img src="{{url('storage/img/bodyclinic-13.jpg')}}"></li> 
                              </ul>
                            </div>
                            <a class="link mobile" href="{{ route('offer', 'poradnia-chorob-watroby') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                        </article>
                    </div>
                </section>
              </li> -->
              <li>
                <section class="home-offer-slide">
                    <header class="basic-s">
                        <div class="header-content">
                            <h3>Poradnia medycyny podróży Medellan</h3>
                              <p>Oferta</p>
                        </div>
                    </header>
                    <div id="home-travel" class="section-body home-offer">
                        <article>
                            <div class="wrapper-a">
                              <header class="basic-a">
                                  <h3>Poradnią Medycyny Podróży Medellan</h3>
                                  <p>Od 2017 r. Medellan jest certyfikowaną Poradnią Medycyny Podróży i należy do Krajowej Sieci Certyfikowanych Centrów Medycyny Podróży pod patronatem Polskiego Towarzystwa Medycyny Morskiej, Tropikalnej i Podróży.</p>
                              </header>
                              <a class="link desctop" href="{{ route('offer', 'poradnia-medycyny-podrozy') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                            </div>
                            <div class="wrapper-b">
                            <ul class="pcw-img-list">
                                  <li><img src="{{url('storage/img/bcg-pmp.png')}}"></li> 
                              </ul>
                            </div>
                            <a class="link mobile" href="{{ route('offer', 'poradnia-medycyny-podrozy') }}">
                                <div><p>Szczegóły</p></div>
                                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                              </a>
                        </article>
                    </div>
                </section>
              </li>
            </ul>
            <a class="prev" href="#">
                <img width="15px" src="{{url('storage/img/icon-arrow-left.png')}}" >
                <!-- <i class="fas fa-angle-left fa-2x">Left</i> -->
            </a>
            <a class="next" href="#">
                <img width="15px" src="{{url('storage/img/icon-arrow-right.png')}}" >

                <!-- <i class="fas fa-angle-right fa-2x">Right</i> -->
            </a>
        </div>
        <!-- <div class="controller">
            <a class="auto" href="#">
                <i class="fas fa-play fa-xs"></i>
                <i class="fas fa-pause fa-xs"></i>
            </a>
            <div class="indicate-area"></div>
        </div> -->
    </section> 

<!-- <section>
    <header class="basic-s">
        <div class="header-content">
            <h3>{{ $treatments->title }}</h3>
            @if($team->subtitle)
              <p>{{ $treatments->subtitle }}</p>
            @endif
        </div>
    </header>
    <div id="home-endoscopy" class="section-body">
        <article>
            <header class="basic-a">
                <h3>{{ $treatments->header }}</h3>
                <p>{{ $treatments->content }}</p>
            </header>
              <ul class="treatments-list">
                  <li>
                      <img class="icon-endoscopy" height="85px" src="{{url('storage/img/icon-gastroscopy1.png')}}" >
                      <div>
                        <a class="link link-arrow" href="{{ route('endoscopy-treatment', ['gastroskopia'])}}">
                          <div><p>Gastroskopia</p></div>
                          <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                        </a>
                      </div>
                  </li>
                  <li>   
                    <img class="icon-endoscopy" height="85px" src="{{url('storage/img/icon-colonoscopy1.png')}}" >
                    <div>
                          <a class="link link-arrow" href="{{ route('endoscopy-treatment', ['kolonoskopia'])}}">
                            <div><p>Kolonoskopia</p></div>
                            <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
                          </a>
                      </div>
                  </li>
              </ul>
        </article>
    </div>
</section> -->

<!-- <section>
    <header class="basic-s">
        <div class="header-content">
            <h3>Poradnia medycyny podróży Medellan</h3>
              <p>Oferta</p>
        </div>
    </header>
    <div id="home-travel" class="section-body home-offer">
    <br><br>
        <article>
            <div class="wrapper-a">
              <header class="basic-a">
                  <h3>Medellan jest certyfikowaną Poradnią Medycyny Podróży</h3>
                  <p>Od 2017 roku jesteśmy certyfikowaną Poradnią Medycyny Podróży i należymy do Krajowej Sieci Certyfikowanych Centrów Medycyny Podróży pod patronatem Polskiego Towarzystwa Medycyny Morskiej, Tropikalnej i Podróży. Wszystko po to, żebyś miał możliwość konsultacji z najlepszymi ekspertami w dziedzinie medycyny podróży. Wiemy, że od tego zależy Twoje bezpieczeństwo.</p>
              </header>
            </div>
            <div class="wrapper-b">

            </div>
        </article>
    </div>
</section> -->

<section class="home-team">
    <header class="basic-s border-b">
        <div class="header-content">
            <h3>{{ $team->title }}</h3>
            @if($team->subtitle)
            <p>{{ $team->subtitle }}</p>
            @endif
        </div>
    </header>
    <div class="section-body">
      <article>
        <header class="basic-a">
          @if($team->header)
          <h3>{{ $team->header }}</h3>
          @endif
          @if($team->content)
            <p>{{ $team->content }}</p>
          @endif
        </header>  
        @livewire('home-team', ['home' => $home])
      </article>
    </div>
</section>
 
 <section id="home-about-section">
      <div class="section-body">
          <article class="home-about">
              <header class="basic-a">
              @if($about->header)
                  <h3>{{ $about->header }}</h3>
              @endif
              @if($about->content)
                <p>{{ $about->content }}</p>
              @endif
              </header>
          </article>
          <div>
              <a class="link" href="{{ route('about') }}">
                <div><p>O nas</p></div>
                <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
              </a>
          </div>
    </div>
 </section>

<section>
  <header class="basic-s">
      <div class="header-content">
      <h3>{{ $news->title }}</h3>
        @if($news->subtitle)
        <p>{{ $news->subtitle }}</p>
        @endif
      </div>
  </header>
  <div class="section-body home-news-body">
  <!-- <header class="basic-a">
      @if($news->header)
          <h3>{{ $news->header }}</h3>
      @endif
      @if($news->content)
        <p>{{ $news->content }}</p>
      @endif
        </header> -->
  <div id="home-news-section">      
    <article>
        <!-- <header class="basic-a">
      @if($news->header)
          <h3>{{ $news->header }}</h3>
      @endif
      @if($news->content)
        <p>{{ $news->content }}</p>
      @endif
        </header> -->
        <!-- <div id="home-news-section"> -->
        <div class="list-wrapper">
            <ul class="news-list">
              @foreach($posts as $post)
              <li>
                  <article>
                      <div class="news-body">
                          <p class="news-date">{{ $post->created_at->format('d.m.Y') }} </p>
                          <a class="news-title" href="{{ route('post', [$post->slug]) }}">
                              <h4> {{ $post->title }} </h4>
                          </a>
                          <div class="news-desc">
                              <p>{!!Str::words(strip_tags($post->content), 30, ' ...') !!}</p>
                          </div>
                          <a class="news-link" href="{{ route('post', [$post->slug]) }}">
                              Całość <img width="35px" src="{{url('storage/img/icon-right-arrowb1.png')}}">
                          </a>
                      </div>
                  </article>
              </li>
              @endforeach
            </ul>
        </div>
    </article>
    <div>
        <a class="link" href="{{ route('news') }}">
          <div><p>Wszystkie</p></div>
          <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
        </a>
    </div>

  </div>

  </div>
</section>

@endsection