@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="schedules">

@foreach($professions as $profession)
<article>
    <ul>
        <li>
            <div class="spec"><h2>{{ $profession->team}}</h2></div>
            <div class="day">Pon.</div>
            <div class="day">Wt.</div>
            <div class="day">Śr.</div>
            <div class="day">Czw.</div>
            <div class="day">Pt.</div>
            <div class="day">Sb.</div>
        </li>

    @foreach($profession->experts as $expert)
    
        <li>
            <div class="spec">
                <h3><a href="{{ route('expert-profile', [$expert->slug]) }}">{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</a></h3>
                @isset($expert->schedule->info)
                <h5>&#9913{{$expert->schedule->info}}</h5>
                @endisset
            </div>
            <div class="day">
                @isset($expert->schedule->mon)
                    <span>Poniedziałki: </span> 
                @endisset
                {{$expert->schedule->mon}}
            </div>
            <div class="day">
                @isset($expert->schedule->tue)
                    <span>Wtorki: </span>
                @endisset
                {{$expert->schedule->tue}}
            </div>
            <div class="day">
                @isset($expert->schedule->wed)
                    <span>Środy: </span>
                @endisset
                {{$expert->schedule->wed}}
            </div>
            <div class="day">
                @isset($expert->schedule->thu)
                <span>Czwartki: </span>
                @endisset
                {{$expert->schedule->thu}}
            </div>
            <div class="day">
                @isset($expert->schedule->fri)
                <span>Piątki: </span>
                @endisset
                {{$expert->schedule->fri}}
            </div>
            <div class="day">
                @isset($expert->schedule->sat)
                <span>Soboty: </span>
                @endisset
                {{$expert->schedule->sat}}
            </div>
            <div class="info">
                @isset($expert->schedule->info)
                <h5>&#9913{{$expert->schedule->info}}</h5>
                @endisset
            </div>
        </li>
    @endforeach
    </ul>
</article>        
@endforeach

</section>

@endsection