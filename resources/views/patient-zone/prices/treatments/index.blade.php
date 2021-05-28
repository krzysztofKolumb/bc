@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="border-t">
    <div class="section-body bcg">
        <article class="main-content">
            @if($section->header || $section->content)
            <header class="basic-a">
                @if($section->header)
                <h2>{{ $section->header }}</h2>
                @endif
                @if($section->content)
                <p>{{ $section->content }}</p>
                @endif
            </header>
            @endif
            <ul class="accordion-list">
            @foreach($clinics as $clinic)
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>{{ $clinic->name }}</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main">
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
                            </div>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>
        <article>
    </div>
</section>

<!-- <section class="consultations">

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

</section> -->

@endsection