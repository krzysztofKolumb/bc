@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section>
    <div class="section-body">
        <article class="main-content">
            @if($page->section->header)
            <header class="main">
                <h2>{{ $page->section->header }}</h2>
            </header>
            @endif

            <div class="article-body">
                @foreach($page->sections as $section)
                    @foreach($section->articles as $article)
                    <section class="flex-body {{$article->class}}">
                        <div class="text-content">
                            {!! $article->content !!}
                        </div>
                        <aside>
                            <ul class="aside-gallery">
                                @if($article->img_1)
                                <li><img src="{{url('storage/img/' . $article->img_1 )}}"></li>
                                @endif
                                @if($article->img_2)
                                <li><img src="{{url('storage/img/' . $article->img_2 )}}"></li>
                                @endif
                                @if($article->img_3)
                                <li><img src="{{url('storage/img/' . $article->img_3 )}}"></li>
                                @endif
                                @if($article->img_4)
                                <li><img src="{{url('storage/img/' . $article->img_4 )}}"></li>
                                @endif
                            </ul>
                        </aside>
                    </section>
                    @endforeach
                @endforeach
            </div>  
        </article>
    </div>
</section>

@foreach($teams as $team)
@if( count($team->experts) > 0)
<header class="basic-s border-t border-b">
        <div class="header-content">
            <h3>{{ $team->team }}</h3>
            <p>Zespół</p>
        </div>
</header>
<article class="team">
    <ul class="team-list">
        @foreach($team->experts as $expert)
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
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</article>
@endif
@endforeach

@foreach($employeeTeams as $team)
@if( count($team->employees) > 0)
<header class="basic-s border-t border-b">
    <div class="header-content">
        <h3>{{ $team->team }}</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content">
    <ul class="team-list">
        @foreach($team->employees as $employee)
        <li>
            <a>
                <div class="wrap wrap-1">
                    <figure>
                    @if($employee->photo)
                        <img src="{{url('storage/photos/' . $employee->photo)}}" >
                    @else
                    <img src="{{url('storage/img/bcg.jpg')}}" >
                    @endif  
                    </figure>
                </div>
                <div class="wrap wrap-2">
                    <header>
                        <h2>{{ $employee->firstname }} {{ $employee->lastname }}</h2>
                        <h3>{{ $employee->description }}</h3>
                    </header>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</article>
@endif
@endforeach

@endsection