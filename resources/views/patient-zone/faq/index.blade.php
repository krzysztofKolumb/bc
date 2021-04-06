@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="faq-section">

<article>
    <ul class="faqs-list">
        @foreach($faqs as $faq)
        <li>
            <article>
                <header>
                    <span class="dot">&#9679; </span>
                    <h3>{{ $faq->question }}</h3>
                </header>
                <div class="content-tm">
                {!! $faq->answear !!}
                </div>
            </article>
        </li>
        @endforeach
    </ul>
</article>

</section>

@endsection