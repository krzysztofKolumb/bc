@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="accordion-section">
    <ul class="nav-search">
    <li profession="0" class="nav-item active"><figure></figure><h4>Wszyscy</h4></li>
    <li profession="1" class="nav-item"><figure><img height="47px" src="{{url('storage/img/icon-lek.png')}}"></figure><h4>Lekarze</h4></li>
    <li profession="2" class="nav-item"><figure><img height="50px" src="{{url('storage/img/icon-dieta3.png')}}"></figure><h4>Dietetycy</h4></li>
    <li profession="4" class="nav-item"><figure><img height="55px" src="{{url('storage/img/icon-fizjo1.png')}}"></figure><h4>Fizjoterapeuci</h4></li>
    <li profession="3" class="nav-item"><figure><img height="50px" src="{{url('storage/img/icon-psycho2.png')}}"></figure><h4>Psycholodzy</h4></li>
    </ul>
    <div class="wrapper">
        <ul class="accordion-list consultation">
            @foreach($experts as $expert)
            <li profession="{{$expert->profession->id}}" class="active accordion-item">
                <article>
                    <header class="accordion-header">
                        <div>
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
                        </div>
                        <img src="{{url('storage/img/icon-plus.png')}}" >
                    </header>
                    <div class="accordion-body">
                        <div class="body-main">
                            <div>{!! $expert->consultations !!}</div>
                            <a class="accordion-link" href="{{ route('expert-profile', [$expert->slug]) }}">Profil</a>
                        </div>
                    </div>
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection