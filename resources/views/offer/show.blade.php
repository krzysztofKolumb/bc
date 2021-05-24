@extends('layouts.page')

@include('inc.page-meta')

@section('main')

@if($page->id == 5)

<section class="border-t">
    <div class="section-body bcg">
        <article>
                <ul class="treatments-list endoscopy">
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

@endif
@if($page->id == 3)
<div class="logo-offer">
    <a target="_blank" title="Poradnia Chorób Wątroby Hepatolodzy" href="http://www.hepatolodzy.pl">
        <img width="200px" src="{{url('storage/img/logo-hepatolodzy.jpg')}}" >
    </a>
</div>
@endif
@if($page->id == 4)
<div class="logo-offer">
    <a target="_blank" title="Poradnia Medycyny Podróży Medellan" href="http://www.medellan.pl">
        <img width="200px" src="{{url('storage/img/logo-medellan.jpg')}}" >
    </a>
</div>
@endif

<!-- <div class= "breadcrumb-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Oferta</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a>{{ $offer->title }}</a></li>
            </ol>
        </nav>
</div>
<span class="line"></span> -->
<!-- <section class="section-main"> -->


<section>
    <div class="section-body">
        <article class="main-content">
            @if($page->section->header)
            <header class="main">
                <h2>{{ $page->section->header }}</h2>
            </header>
            @endif

            <div class="article-body">
                @foreach($page->sections as $section)
                    @foreach($section->articles as $article)
                    <section class="flex-body {{$article->layout->class}}">
                        <div class="text-content">
                            {!! $article->content !!}
                        </div>
                        <aside>
                            <ul class="aside-gallery">
                                @if($article->img_1)
                                <li><img src="{{url('storage/img/' . $article->img_1 )}}"></li>
                                @endif
                                @if($article->img_2)
                                <li><img src="{{url('storage/img/' . $article->img_2 )}}"></li>
                                @endif
                                @if($article->img_3)
                                <li><img src="{{url('storage/img/' . $article->img_3 )}}"></li>
                                @endif
                                @if($article->img_4)
                                <li><img src="{{url('storage/img/' . $article->img_4 )}}"></li>
                                @endif
                            </ul>
                        </aside>
                    </section>
                    @endforeach
                @endforeach
            </div>  
        </article>
    </div>

</section>












<!-- <section>
    <div class="section-body">
        <article class="main-content">
            @if($page->section->header)
            <header class="main">
                <h2>{{ $page->section->header }}</h2>
            </header>
            @endif

            <div class="article-body">
            @foreach($page->sections as $section)
                @if($section->content)
                <section class="flex-body {{$section->class}}">
                    <div class="text-content">
                        {!! $section->content !!}
                    </div>
                    <aside>
                        <ul class="aside-gallery">
                            @foreach($section->pictures as $picture)
                                @if(Str::contains($picture->name, 'logo-hepatolodzy'))
                                <li class="logo-offer">
                                    <div>
                                        <a target="_blank" title="Poradnia Chorób Wątroby Hepatolodzy" href="http://www.hepatolodzy.pl">
                                            <img src="{{url('storage/img/logo-hepatolodzy.jpg')}}" >
                                        </a>
                                    </div>
                                </li>
                                @elseif(Str::contains($picture->name, 'logo-medellan'))
                                <li class="logo-offer">
                                    <div>
                                        <a target="_blank" title="Poradnia Medycyny Podróży Medellan" href="http://www.medellan.pl">
                                            <img src="{{url('storage/img/logo-medellan.jpg')}}" >
                                        </a>
                                    </div>
                                </li>
                                @else
                                <li><img src="{{url('storage/img/' . $picture->name )}}"></li>
                                @endif
                            @endforeach
                        </ul>
                    </aside>
                </section>
                @endif
                @endforeach
            </div>  
        </article>
    </div>
</section> -->

@if($page->id == 6)
<section class="border-t">
    <header class="basic-s">
        <div class="header-content">
            <h3>{{ $section->title }}</h3>
            @if($section->subtitle)
              <p>{{ $section->subtitle }}</p>
            @endif
        </div>
    </header>
    <div class="section-body bcg">
        <article class="main-content">
            @if($section->header)
            <header class="basic-a">
                <h2>{{ $section->header }}</h2>
                <p>{{ $section->content }}</p>
            </header>
            @endif
            @foreach($categories as $category)
            <div class="ct-recrutations">
                <h4>{{ Str::ucfirst($category->title) }}</h4>
                <ul class="accordion-list">
                    @foreach($category->clinicalTrials as $clinicalTrial)
                    <li class="active accordion-item">
                        <article>
                            <header class="accordion-header">
                                <div>
                                    <h2>{{ $clinicalTrial->title }}</h2>
                                </div>
                                <img src="{{url('storage/img/icon-plus.png')}}" >
                            </header>
                            <div class="accordion-body">
                                <div class="body-main">
                                    <div>{!! $clinicalTrial->content !!}</div>
                                </div>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </article>
    </div>
</section>
@endif

<section>
        @foreach($teams as $team => $experts)
        <article class="team">
            <header class="basic-s border-b @if($page->id !== 6) border-t @endif">
                <div class="header-content">
                    <h3>{{ $professions->find($team)->team }}</h3>
                    <p>Zespół</p>
                </div>
            </header>
            <ul class="team-list">
                @foreach($experts as $expert)
                <li>
                    <a href="{{ route('expert-profile', [$expert->slug]) }}">
                        <div class="wrap wrap-1">
                            <figure>
                                @if($expert->photo)
                                <img src="{{url('storage/photos/' . $expert->photo)}}" >
                                @else
                                <img src="{{url('storage/img/bcg.jpg')}}" >
                                @endif  
                            </figure>
                        </div>
                        <div class="wrap wrap-2">
                            <header>
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
                            </header>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </article>
    @endforeach
</section>

@if($page->id == 8)
<section>
    <header class="basic-s border-t">
        <div class="header-content">
            <h3>{{ $section_lab->title }}</h3>
            @if($section_lab->subtitle)
            <p>{{ $section_lab->subtitle }}</p>
            @endif
        </div>
    </header>
    <x-lab-tests/>
</section>

<section>
    <header class="basic-s">
        <div class="header-content">
            <h3>{{ $section_lab_package->title }}</h3>
            @if($section_lab_package->subtitle)
            <p>{{ $section_lab_package->subtitle }}</p>
            @endif
        </div>
    </header>
    <x-lab-packages/>
</section>
@endif

@if($page->id == 5)
<section class="border-t">
    <header class="basic-s">
        <div class="header-content">
            <h3>Materiały do pobrania</h3>
            <p>Pracownia Endoskopii</p>
        </div>
    </header>
    <div class="section-body bcg">
        <article class="main-content">

            <div class="article-body">
                <ul class="download-files-list endoscopy">
                    @foreach($files as $file)
                    <li>
                        <h4>{{ Str::beforeLast($file->title, '.') }}</h4>
                        <a href="{{url('storage/files/' . $file->title)}}" download>Pobierz</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </article>
    </div>
</section>
@endif

@if($page->id == 5)

<section>
    <header class="basic-s">
        <div class="header-content">
            <h3>{{$section_treatments->title}}</h3>
            @if($section_treatments->subtitle)
              <p>{{ $section_treatments->subtitle }}</p>
              @endif
        </div>
    </header>
    <div class="section-body bcg">
        <article>
              <header class="basic-a">
                <h3>{{$section_treatments->header}}</h3>
                @if($section_treatments->content)
                <p>{{ $section_treatments->content }}</p>
                @endif
              </header>
              
                <ul class="treatments-list endoscopy">
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

@endif

@endsection