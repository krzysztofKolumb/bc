@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="content">
    <article>
        <div class="content-tm">
            {!! $content->content !!}
        <div>
    </article>
</section>

@foreach($teams as $team)
@if($team->experts->count() > 0)
<header class="header-basic">
        <div class="header-content">
            <h3>{{ $team->team }}</h3>
            <p>Zespół</p>
        </div>
</header>
<article class="team-content">
<ul class="team-list">
    @foreach($team->experts as $expert)
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
</article>
<span class="line"></span>
@endif
@endforeach

@foreach($employeeTeams as $team)
@if($team->employees->count() > 0)
<header class="header-basic">
    <div class="header-content">
        <h3>{{ $team->team }}</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content">
<ul class="team-list">
    @foreach($team->employees as $employee)
    <li>
        
        <article>
            <a>
                <figure>
                @if($employee->photo)
                    <img src="{{url('storage/photos/' . $employee->photo)}}" >
                @else
                    <div class="photo-prev"></div>
                @endif
                </figure>
                <h2>{{ $employee->firstname }} {{ $employee->lastname }}</h2>
                <h3>{{ $employee->description }}</h3>
            </a>
        </article>   
    </li>
    @endforeach
</ul>
</article>
<span class="line"></span>
@endif
@endforeach
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header> 
@endsection