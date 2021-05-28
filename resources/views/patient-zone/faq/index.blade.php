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
            @foreach($faqs as $faq)
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>{{ $faq->question }}</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main text">
                            {!! $faq->answear !!}
                            </div>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>
        <article>
    </div>
</section>








<!-- <section class="faq-section">

<article>
<div class="accordion accordion-flush" id="accordion-faq">
        @foreach($faqs as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-faq-{{$faq->id}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-faq-{{$faq->id}}" aria-expanded="false" aria-controls="flush-collapse-">
                <span class="dot">&#9679; </span>
                {{ $faq->question }}
            </button>
            </h2>
            <div id="flush-collapse-faq-{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="flush-" data-bs-parent="#accordion-faq">
            <div class="accordion-body">
                <div class="content-tm">
                    {!! $faq->answear !!}
                </div>
            </div>
            </div>
        </div>
        @endforeach
</div>
</article>

</section> -->

@endsection