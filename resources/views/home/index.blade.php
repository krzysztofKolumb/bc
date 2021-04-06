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

<section class="home-hexgrid">
    
    <ul class="hexGrid">
          
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
            <h2>Poradnia Chorób Wątroby</h2>
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
            <h2>Poradnia Medycyny Podróży</h2>
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
        <a class="hexLink" href="{{ route('offer', 'diagnostyka-obrazowa') }}">
              <picture>
              </picture>
            <div class="hexContent">
             <img class="icon diagnostic" src="{{url('storage/img/icon-do.png')}}" >
            <h2>Diagnostyka Obrazowa</h2>
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
    
    </ul>
    
    <div class="link-basic">
        <a href="{{ route('specialties') }}">Wszystkie specjalizacje <i class="icon-right-dir"></i></a>
    </div>
    
</section>

<header class="header-basic home-endoscopy-header">
        <div class="header-content">
            <h3>Zabiegi</h3>
            <p>Pracownia Endoskopii</p>
        </div>
</header>
<section class="endoscopy-lab-menu basic-bcg home-endoscopy">
<article>
      <h3 class="basic">Dowiedz się więcej o zabiegach gastroskopii i kolonoskopii wykonywanych w Pracownii Endoskopii</h3>
        <ul>
            <li>
                <img height="80px" src="{{url('storage/img/icon-gastroscopy.png')}}" >
                <a href="{{ route('endoscopy-treatment', ['gastroskopia'])}}">
                    <h3>Gastroskopia <i class="icon-right-dir"></i></h3>
                </a>
            </li>
            <li>
                <img height="80px" src="{{url('storage/img/icon-colonoscopy.png')}}" >
                <a href="{{ route('endoscopy-treatment', ['kolonoskopia'])}}">
                    <h3>Kolonoskopia <i class="icon-right-dir"></i></h3>
                </a>
            </li>
        </ul>
</article>
</section>

<section class="home-team">
  <header class="header-basic">
    <div class="header-content">
      <h3>Zespół</h3>
      @if($team->subtitle)
      <p>{{ $team->subtitle }}</p>
      @endif
    </div>
  </header>
  @if($team->content)
      <h3 class="basic">{{ $team->content }}</h3>
  @endif
  <article class="team-content">
  <ul class="team-list">
    @foreach($home->experts as $expert)
      <li>
        <article>
            <a href="{{ route('expert-profile', [$expert->slug]) }}">
              <figure>
                @if($expert->photo)
                    <img src="{{url('storage/photos/' . $expert->photo)}}" >
                @else
                <div class="photo-prev"></div>
                @endif  
                </figure>
              <h2>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h2>
              <h3>
              @foreach($expert->specialties as $specialty)
                  @if ($loop->last)
                  {{ $specialty->name }}
                  @else
                  {{ $specialty->name }},
                  @endif
              @endforeach
              </h3>
            </a>
          </article>
      </li>
    @endforeach
  </ul>
  <div class="link-wrapper-solid">
        <a href="{{ route('team') }}">
          Cały zespół <i class="icon-right-dir"></i> 
        </a>
  </div>
  </article>
</section>
 
 <section class="basic-bcg">
   <article class="home-about">
     <div class="content-tm">
        {!! $about->content !!}
    </div>
   </article>
   <div class="link-wrapper-grad">
        <a href="{{ route('specialties') }}">
          O nas
          <i class="icon-right-dir"></i> 
        </a>
    </div>
 </section>

<section class="home-news">
  <header class="header-basic">
      <div class="header-content">
        <h3>Aktualności</h3>
        @if($news->subtitle)
        <p>{{ $news->subtitle }}</p>
        @endif
      </div>
  </header>

  <ul class="news-list">
    @foreach($posts as $post)
    <li>
      <article>
        <h4 class="news-title">{{ $post->title }} </h4>
        <p class="news-date">{{ $post->created_at->format('d.m.Y') }} </p>
        <div class="news-desc">
        {!! Str::limit($post->content, 300, ' (...)') !!}
        </div>
        <a class="news-link" href="{{ route('post', [$post->slug]) }}">
          Całość 
          <i class="icon-right-dir"></i>
        </a>
      </article>
    </li>
    @endforeach
  </ul>

  <div class="link-wrapper-solid">
        <a href="{{ route('news') }}">
          Wszystkie
          <i class="icon-right-dir"></i> 
        </a>
  </div>

</section>

@endsection