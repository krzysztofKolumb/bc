@extends('layouts.page')

@section('meta_title')
{{ $post->title }} | BodyClinic
@endsection

@section('title')
Aktualności
@endsection

@section('main')
<section class="news-section news-page">
    <div class="section-body">
    <article>
    <div class="list-wrapper">
                <ul class="news-list">
                    <li>
                        <article>
                            <div class="news-body">
                                <p class="news-date">{{ $post->created_at->format('d.m.Y') }} </p>
                                <a class="news-title">
                                    <h4> {{ $post->title }} </h4>
                                </a>
                                <div class="news-desc">
                                {!! $post->content !!}
                                </div>
                            </div>
                        </article>
                    </li>
                </ul>
            </div>
    </article>
    </div>
</section>
@endsection