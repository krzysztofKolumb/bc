@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="content">
    <article>
        <div class="content-tm">
        {!! $desc->content !!}
        <div>
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
<article class="team-content">
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
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header>
@endsection