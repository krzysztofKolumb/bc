@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="news-section news-page">
    <article>
        <ul class="news-list">
        @foreach($posts as $post)
        <li>
            <article>
                <header>
                    <span class="dot">&#9679; </span>
                    <a href="{{ route('post', [$post->slug]) }}">
                        <h4 class="news-title"> {{ $post->title }} </h4>
                    </a>
                </header>
                <p class="news-date">{{ $post->created_at->format('d.m.Y') }} </p>
                <div class="content-tm">
                {!! Str::limit($post->content, 300, ' (...)') !!}
                </div>
                <a class="news-link" href="{{ route('post', [$post->slug]) }}">
                Całość 
                <i class="icon-right-dir"></i>
                </a>
            </article>
        </li>
        @endforeach
        </ul>
    </article>
    <div class="pagination-wrapper">
        {{ $posts->render() }}
    </div>
</section>
@endsection