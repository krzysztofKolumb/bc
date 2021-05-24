@extends('layouts.page')

@section('meta_title')
{{ $page->meta_title}}
@endsection

@section('meta_description')
{{ $page->meta_description }}
@endsection

@section('title')
Zespół
@endsection

@section('subtitle')
{{ Str::ucfirst($expert->profession->name) }}
@endsection

@section('main')
<section class="expert-profile">
    <div class= "breadcrumb-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('team') }}">Zespół</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</li>
            </ol>
        </nav>
    </div>
    <article>
    
        <header class="mobile-header">
            <h1>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h1>
            <h2>{{ Str::ucfirst($expert->profession->name) }}</h2>
        </header>
        <div class="expert-photo">
            @if($expert->photo)
            <figure>
                <img src="{{url('storage/photos/' . $expert->photo)}}" >
                <figcaption>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}, {{ $expert->profession->name }}</figcaption>
            <figure>
            @endif
        </div>
        <div class="spec-desc">
        <header class="desktop-header">
            <h1>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h1>
            <h2>{{ Str::ucfirst($expert->profession->name) }}</h2>
        </header>
            <ul>
                @if($expert->general_info)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-profile.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Informacje ogólne</h3>
                        <div class="content">
                                {!! $expert->general_info !!}
                        </div>
                    </div>    
                </li>
                @endif
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-stetoskop-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Specjalizacje</h3>
                        <div class="content">
                        @foreach($expert->specialties as $specialty)
                            <p><a href="{{ route('specialty', [$specialty->slug]) }}">{{ $specialty->name }}</a></p>
                        @endforeach
                        </div>
                    </div>    
                </li>
                @if($expert->education)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-edu-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Wykształcenie</h3>
                        <div class="content">
                            {!! $expert->education !!}
                        </div>
                    </div>    
                </li>
                @endif
                @if($expert->experience)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-dosw-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Doświadczenie zawodowe</h3>
                        <div class="content">
                        {!! $expert->experience !!}
                        </div>
                    </div>    
                </li>
                @endif
                @if($expert->certificates)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-cert-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Certyfikaty</h3>
                        <div class="content">
                        {!! $expert->certificates !!}
                        </div>
                    </div>    
                </li>
                @endif
                @if($expert->awards)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-nagrody-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Nagrody i Wyróżnienia</h3>
                        <div class="content">
                        {!! $expert->awards !!}
                        </div>
                    </div>    
                </li>
                @endif
                @if($expert->help)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-choroby-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Leczone choroby</h3>
                        <div class="content">
                        {!! $expert->help !!}
                        </div>
                    </div>    
                </li>
                @endif
                @if($expert->links)
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-link.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Linki</h3>
                        <div class="content">
                        {!! $expert->links !!}
                        </div>
                    </div>    
                </li>
                @endif
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-grafik-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Grafik przyjęć</h3>
                        <div class="content">
                            @if($expert->schedule->mon)
                            <div class="schedule">
                                <span>Poniedziałki:</span>
                                <p>{{ $expert->schedule->mon}}</p>
                            </div>
                            @endif
                            @if($expert->schedule->tue)
                            <div class="schedule">
                                <span>Wtorki:</span>
                                <p>{{ $expert->schedule->tue }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->wed)
                            <div class="schedule">
                                <span>Środy:</span>
                                <p>{{ $expert->schedule->wed }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->thu )
                            <div class="schedule">
                                <span>Czwartki:</span>
                                <p>{{ $expert->schedule->thu }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->fri )
                            <div class="schedule">
                                <span>Piątki:</span>
                                <p>{{ $expert->schedule->fri }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->sat )
                            <div class="schedule">
                                <span>Soboty:</span>
                                <p>{{ $expert->schedule->sat }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->info )
                            <div class="schedule">
                                <span>Dodatkowe informacje:</span>
                                <p>{{ $expert->schedule->info }}</p>
                            </div>
                            @endif
                        </div>
                    </div>    
                </li>
            </ul>
        </div>
    </article>
</section>

@if($recommendations->count() > 0)
<section>
    <header class="basic-s border-t">
        <div class="header-content">
            <h3>Rekomendacje</h3>
                <p>Zespół</p>
        </div>
    </header>
    <div class="expert-recommendations-wrapper">
    <section class="jd-slider slider2">
        <div class="slide-inner">
            <ul class="slide-area expert-recommendations-list">
            @foreach($recommendations as $recommendation)
            <li class="recommendation" slide="{{ $loop->iteration }}">
                <div class="recommendation-body">
                    <div class="quote-container">
                    <img class="icon-quote" src="{{url('storage/img/icon-quote1.png')}}">
                    <h4>{{ $recommendation->content }}</h4>
                    </div>
                    <h5><a title="{{ $recommendation->expert->degree->name }} {{ $recommendation->expert->firstname }} {{$recommendation->expert->lastname}}" href="{{ route('expert-profile', [$recommendation->expert->slug]) }}">- {{ $recommendation->expert->degree->name }} {{ $recommendation->expert->firstname }} {{$recommendation->expert->lastname}}</a></h5>
                </div>
            </li>
                @endforeach
            </ul>
            <a class="prev" href="#">
                <img width="15px" src="{{url('storage/img/icon-arrow-left.png')}}" >
            </a>
            <a class="next" href="#">
                <img width="15px" src="{{url('storage/img/icon-arrow-right.png')}}" >
            </a>
        </div>
        <div class="controller">
            <div class="indicate-area"></div>
        </div>
    </section> 
    </div>
</section>



























<!-- <section class="recommendations-section">
    <div>
        <ul id="recommendations-list">
            @foreach($recommendations as $recommendation)
            <li class="recommendation fade" slide="{{ $loop->iteration }}">
                <div class="quote-container">
                <img class="icon-quote" src="{{url('storage/img/icon-quote.png')}}">
                <h4>{{ $recommendation->content }}</h4>
                </div>
                <h5><a title="{{ $recommendation->expert->degree->name }} {{ $recommendation->expert->firstname }} {{$recommendation->expert->lastname}}" href="{{ route('expert-profile', [$recommendation->expert->slug]) }}">- {{ $recommendation->expert->degree->name }} {{ $recommendation->expert->firstname }} {{$recommendation->expert->lastname}}</a></h5>
            </li>
            @endforeach
        </ul>
        <div id="slider-dots" class="dots">
            @if($recommendations->count() > 1)
                @foreach($recommendations as $recommendation)
                    <span class="dot" slide="{{ $loop->iteration }}">&#9679; </span>
                @endforeach
            @endif
        </div>
    </div>
</section> -->
@endif

@endsection