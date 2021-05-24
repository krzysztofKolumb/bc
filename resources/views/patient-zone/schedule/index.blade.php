@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="tabs-section">
<ul class="nav-search">
  <li profession="0" class="nav-item active"><figure></figure><h4>Wszyscy</h4></li>
  <li profession="1" class="nav-item"><figure><img height="47px" src="{{url('storage/img/icon-lek.png')}}"></figure><h4>Lekarze</h4></li>
  <li profession="2" class="nav-item"><figure><img height="50px" src="{{url('storage/img/icon-dieta3.png')}}"></figure><h4>Dietetycy</h4></li>
  <li profession="4" class="nav-item"><figure><img height="55px" src="{{url('storage/img/icon-fizjo1.png')}}"></figure><h4>Fizjoterapeuci</h4></li>
  <li profession="3" class="nav-item"><figure><img height="50px" src="{{url('storage/img/icon-psycho2.png')}}"></figure><h4>Psycholodzy</h4></li>
</ul>
<div class="wrapper">

<div class="schedules bcg">
<article>
    <ul class="search-result-content">
        <li>
            <div class="spec"></div>
            <div class="day">Pon.</div>
            <div class="day">Wt.</div>
            <div class="day">Śr.</div>
            <div class="day">Czw.</div>
            <div class="day">Pt.</div>
            <div class="day">Sb.</div>
        </li>

    @foreach($experts as $expert)
    
        <li class="active" profession="{{$expert->profession->id}}">
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
</div>
</section>

@endsection