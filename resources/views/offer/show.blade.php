@extends('layouts.page')

@section('meta_title')
{{ $offer->page->meta_title }}
@endsection

@section('title')
{{ $offer->page->title }}
@endsection

@section('subtitle')
{{ $offer->page->subtitle }}
@endsection

@section('description')
{{ $offer->page->description }}
@endsection

@section('keywords')
{{ $offer->page->keywords }}
@endsection

@section('main')

@if($offer->page->id == 5)
<section class="endoscopy-lab-menu basic-bcg">
<article>
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
@endif

<section class="content offer-content">
    <article>
        <div class="content-tm">
        {!! $desc->content !!}
        </div>
        <aside>
            <div class="aside-content">
                @if($offer->page->id == 3)
                <div class="link-wrapper-grad">
                    <a target="_blank" title="Poradnia Chorób Wątroby Hepatolodzy" href="http//www.hepatolodzy.pl">
                        <img src="{{url('storage/img/logo-hepatolodzy.jpg')}}" >
                    </a>
                </div>
                @endif
                @if($offer->page->id == 4)
                <div class="link-wrapper-grad">
                    <a target="_blank" title="Poradnia Medycyny Podróży Medellan" href="http://www.medellan.pl">
                        <img src="{{url('storage/img/logo-medellan.jpg')}}" >
                    </a>
                </div>
                @endif
            </div>   
        </aside>   
    </article>
</section>

@foreach($professions as $profession)
@if( count($offer->page->experts->where('profession_id', $profession->id)) > 0 )
<header class="header-basic">
    <div class="header-content">
        <h3>{{ $profession->team }}</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content ">
<ul class="team-list">
    @foreach($offer->page->experts as $expert)
    @if( $profession->id === $expert->profession->id )
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
    @endif
    @endforeach
</ul>
</article>
<span class="line"></span>
@endif
@endforeach
@if($offer->page->id == 5)
<section class="endoscopy-download-files-section">
    <header class="header-basic">
        <div class="header-content">
            <h3>Materiały do pobrania</h3>
            <p>Pracownia Endoskopii</p>
        </div>
    </header>
    <article>
        <ul class="download-files">
            @foreach($files as $file)
            <li>
                <a href="{{url('storage/files/' . $file->title . '.' . $file->name)}}" download>
                    <div>
                        <span class="dot">&#9679; </span>
                        <h4>{{ $file->title }}</h4>
                    </div>
                    <i class="icon-down-dir-1"></i>
                </a>
            </li>
            @endforeach
        </ul>
    </article>
</section>
@endif
@if($offer->page->id == 5)
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zabiegi</h3>
            <p>Pracownia Endoskopii</p>
        </div>
</header>
<section class="endoscopy-lab-menu basic-bcg">
<article>
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
@endif
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header>

@endsection