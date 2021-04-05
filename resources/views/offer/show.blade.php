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
                    <h3>Gastroskopia <i class="bi bi-arrow-right"></i></h3>
                </a>
            </li>
            <li>
                <img height="80px" src="{{url('storage/img/icon-colonoscopy.png')}}" >
                <a href="{{ route('endoscopy-treatment', ['kolonoskopia'])}}">
                    <h3>Kolonoskopia <i class="bi bi-arrow-right"></i></h3>
                </a>
            </li>
        </ul>
</article>
</section>
@endif

<section class="content">
    <article>
        <div class="content-tm">
        {!! $desc->content !!}
        <div>
        <aside>
        </aside>
    </article>
</section>

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
                <h4><span class="dot">&#9679; </span> {{ $file->title }}</h4>
                <i class="bi bi-download"></i></a>
            </li>
            @endforeach
        </ul>
    </article>
</section>
@endif

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
@if(count($grouped) > 1)
<span class="line"></span>
@endif

@endif
@endforeach

@endsection