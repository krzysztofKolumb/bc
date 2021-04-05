@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="consultations">

<article>
    <ul class="faqs-list">
        @foreach($faqs as $faq)
        <li>
            <h3><span class="dot">&#9679; </span> {{ $faq->question }}</h3>
            <div class="content-tm">
            {!! $faq->answear !!}
            </div>
        </li>
        @endforeach
    </ul>
</article>

</section>

@endsection