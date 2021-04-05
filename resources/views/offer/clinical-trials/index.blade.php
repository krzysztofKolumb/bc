@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="content">
    <article>
        <div class="content-tm">
        {!! $desc->content !!}
        <div>
        <aside>
        </aside>
    </article>
</section>

<section class="clinical-trials-section">
<header class="header-basic">
    <div class="header-content">
        <h3>Lekarze</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content">
<ul class="team-list">
    @foreach($page->experts as $expert)
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
</section>
<span class="line"></span>
<section class="clinical-trials-section ct-recrutations-section">
<header class="header-basic">
    <div class="header-content">
        <h3>Aktualne rekrutacje</h3>
        <p>Badania kliniczne</p>
    </div>
</header>

<div class="wrapper-bcg">
<div class="clinical-trials-list">

@foreach($categories as $category)
<article>
<h3>{{ Str::ucfirst($category->title) }}</h3>

<div class="accordion accordion-flush" id="accordion-clinical-trials-{{ $category->slug }}">
@foreach($category->clinicalTrials as $clinicalTrial)
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-clinical-trial-{{ $clinicalTrial->id }}">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-clinical-trial-{{ $clinicalTrial->id }}" aria-expanded="false" aria-controls="flush-collapse-clinical-trial-{{ $clinicalTrial->id }}">
      <div class="accordion-button-title">
      {{ $clinicalTrial->title }}
      </div>
      </button>
    </h2>
    <div id="flush-collapse-clinical-trial-{{ $clinicalTrial->id }}" class="accordion-collapse collapse" aria-labelledby="flush-clinical-trial-{{ $clinicalTrial->id }}" data-bs-parent="#accordion-clinical-trials-{{ $category->slug }}">
        <div class="accordion-body">
            <div class="content-tm">
            {!! $clinicalTrial->content !!}
            </div>
        </div>
    </div>
  </div>
  @endforeach
</div>
</article>
@endforeach
</div>
</div>
</section>
<!-- <header class="header-basic">
    <div class="header-content">
        <h3>Zapisy online</h3>
        <p>Badania kliniczne</p>
    </div>
</header> -->
<span class="line"></span>

@endsection