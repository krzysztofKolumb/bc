@extends('layouts.page')

@section('meta_title')
{{ $post->title }} | BodyClinic
@endsection

@section('title')
Aktualności
@endsection

@section('main')
<section class="news-section">
    <article>
        <ul class="news-list">
        <li>
            <article>
                <h4 class="news-title"><span class="dot">&#9679; </span> {{ $post->title }} </h4>
                <p class="news-date">{{ $post->created_at->format('d.m.Y') }} </p>
                <div class="content-tm">
                {!! $post->content !!}
                </div>
            </article>
        </li>
        </ul>

    </article>
</section>
@endsection