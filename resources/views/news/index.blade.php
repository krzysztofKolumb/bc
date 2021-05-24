@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="news-page">
    <div class="section-body">
        <article>
            @if($section->header)
            <header class="basic-a">
                <h3>{{ $section->header }}</h3>
                @if($section->content)
                <p>{{ $section->content }}</p>
                @endif
            </header>
            @endif
            <div class="list-wrapper">
                <ul class="news-list">
                    @foreach($posts as $post)
                    <li>
                        <article>
                            <div class="news-body">
                                <p class="news-date">{{ $post->created_at->format('d.m.Y') }} </p>
                                <a class="news-title" href="{{ route('post', [$post->slug]) }}">
                                        <h4> {{ $post->title }} </h4>
                                </a>
                                <div class="news-desc">
                                    <p>{!!Str::words(strip_tags($post->content), 30, ' ...') !!}</p>
                                </div>
                                <a class="news-link" href="{{ route('post', [$post->slug]) }}">
                                    Całość <img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}">
                                </a>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
        </article>
        @if(count($posts) > 9 )
        <div class="pagination-wrapper">
            {{ $posts->render() }}
        </div>
        @endif
    </div>
</section>
@endsection