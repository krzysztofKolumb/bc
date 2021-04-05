@extends('layouts.page')

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
        <article>
            <a href="{{ route('expert-profile', [$expert->slug]) }}">
                <figure>
                @if($expert->photo)
                    <img src="{{url('storage/photos/' . $expert->photo)}}" >
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
</section>

@endsection