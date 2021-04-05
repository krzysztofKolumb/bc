@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="consultations">

@foreach($professions as $profession)
<article>
    <h3>{{ Str::ucfirst($profession->team) }}</h3>
    <div class="accordion accordion-flush" id="accordion-consultations-profession-{{ $profession->id }}">
        @foreach($profession->experts as $expert)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-expert-consultation-{{$expert->id}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-expert-consultation-{{$expert->id}}" aria-expanded="false" aria-controls="flush-collapse-consultations-profession-{{$profession->id}}">
                <span class="dot">&#9679; </span>
                {{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}
            </button>
            </h2>
            <div id="flush-collapse-expert-consultation-{{$expert->id}}" class="accordion-collapse collapse" aria-labelledby="flush-consultations-profession-{{$profession->id}}" data-bs-parent="#accordion-consultations-profession-{{ $profession->id }}">
            <div class="accordion-body">
                <div class="content-tm">
                    {!! $expert->consultations !!}
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>

</article>
@endforeach

</section>

@endsection