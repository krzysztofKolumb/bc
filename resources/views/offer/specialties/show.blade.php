@extends('layouts.page')

@section('meta_title')
{{ $specialty->name }} | Przychodnia BodyClinic
@endsection

@section('title')
{{ $specialty->name }}
@endsection

@section('subtitle')
Specjaliści
@endsection

@section('main')

<section class="specialty-team">

<article class="team-content">
    <ul class="team-list">
        @foreach($specialty->experts as $expert)
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
                    <!-- <p><span>Profil</span></p> -->
                </div>
            </a>
        </li>
        <!-- <li>
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
        </li> -->
        @endforeach
    </ul>
</article>
</section>

@endsection