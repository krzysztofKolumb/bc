@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="content">
    <article>
        <div class="content-tm">
        {!! $desc->content !!}
        </div>
    </article>
</section>

<section class="endoscopy-download-files-section">
    <header class="header-basic">
        <div class="header-content">
            <h3>Materiały do pobrania</h3>
            <p>Rejestracja</p>
        </div>
    </header>
    <article>
        <ul class="download-files">
            @foreach($files as $file)
            <li>
                <a href="{{url('storage/files/' . $file->title . '.' . $file->name)}}" download>
                <h4><span class="dot">&#9679; </span> {{ $file->title }}</h4>
                <i class="bi bi-download"></i></a>
            </li>
            @endforeach
        </ul>
    </article>
</section>

<section>   
@if( count($profession->employees) > 0 )
<header class="header-basic">
    <div class="header-content">
        <h3>{{ $profession->team }}</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content">
<ul class="team-list">
    @foreach($profession->employees as $employee)
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
                <h3>
                    {{ $employee->description }}
                </h3>
            </a>
        </article>   
    </li>
    @endforeach
</ul>
</article>
<span class="line"></span>
@endif
</section>
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header> 
@endsection