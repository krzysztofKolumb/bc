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
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-stetoskop-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Specjalizacje</h3>
                        <div class="content">
                        @foreach($expert->specialties as $specialty)
                            <p>{{ $specialty->name }} </p>
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
                <li>
                    <div class="icon-profile">
                        <img src="{{url('storage/img/icon-grafik-grad.png')}}" >
                    </div>
                    <div class="desc">
                        <h3>Grafik przyjęć</h3>
                        <div class="content">
                            <div class="schedule">
                                <span>DZIEŃ TYG.</span>
                                <span>W GODZ.</span>
                            </div>
                            @if($expert->schedule->mon)
                            <div class="schedule">
                                <span>Poniedziałek:</span>
                                <p>{{ $expert->schedule->mon}}</p>
                            </div>
                            @endif
                            @if($expert->schedule->tue)
                            <div class="schedule">
                                <span>Wtorek:</span>
                                <p>{{ $expert->schedule->tue }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->wed)
                            <div class="schedule">
                                <span>Środa:</span>
                                <p>{{ $expert->schedule->wed }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->thu )
                            <div class="schedule">
                                <span>Czwartek:</span>
                                <p>{{ $expert->schedule->thu }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->fri )
                            <div class="schedule">
                                <span>Piątek:</span>
                                <p>{{ $expert->schedule->fri }}</p>
                            </div>
                            @endif
                            @if($expert->schedule->sat )
                            <div class="schedule">
                                <span>Sobota:</span>
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
<span class="line"></span>
@endsection