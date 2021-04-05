@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="consultations">

@foreach($clinics as $clinic)
<article>
    <h3><span class="dot">&#9679; </span> {{ $clinic->name }}</h3>
    <ul class="treatments-price-list">
        @foreach($clinic->treatments as $treatment)
        <li>
            <h4>{{ $treatment->name }}</h4>
            @if(Str::contains(strtolower($treatment->price), 'pln'))
            <p>{{ $treatment->price }}</p>
            @else
            <p>{{ $treatment->price }} pln</p>
            @endif
        </li>
        @endforeach
    </ul>
</article>
@endforeach

</section>

@endsection