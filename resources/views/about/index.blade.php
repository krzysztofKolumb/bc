@extends('layouts.page')

@include('inc.page-meta')

@section('main')
<section>
    <div class="section-body">
        <article class="main-content">
            @if($page->section->header)
            <header class="main">
                <h2>{{ $page->section->header }}</h2>
            </header>
            @endif

            <div class="article-body">
                @foreach($page->sections as $section)
                    @foreach($section->articles as $article)
                    <section class="flex-body {{$article->layout->class}}">
                        <div class="text-content">
                            {!! $article->content !!}
                        </div>
                        <aside>
                            <ul class="aside-gallery">
                                @if($article->img_1)
                                <li><img src="{{url('storage/img/' . $article->img_1 )}}"></li>
                                @endif
                                @if($article->img_2)
                                <li><img src="{{url('storage/img/' . $article->img_2 )}}"></li>
                                @endif
                                @if($article->img_3)
                                <li><img src="{{url('storage/img/' . $article->img_3 )}}"></li>
                                @endif
                                @if($article->img_4)
                                <li><img src="{{url('storage/img/' . $article->img_4 )}}"></li>
                                @endif
                            </ul>
                        </aside>
                    </section>
                    @endforeach
                @endforeach
            </div>  
        </article>
    </div>

</section>

<section>
    <header class="basic-s border-t">
        <div class="header-content">
            <h3>{{ $gallery->title }}</h3>
            @if($gallery->subtitle)
            <p>{{ $gallery->subtitle }}</p>
            @endif
        </div>
    </header>
    <div class="section-body bcg">
        <article>
            <header class="basic-a">
                <h3>{{ $gallery->header }}</h3>
                @if($gallery->content)
                <p>{{ $gallery->content }}</p>
                @endif              
            </header>

            <div class="home-hexgrid about-gallery">
                <ul class="hexGrid aboutHexGrid">
                    @foreach($page->pictures as $picture)
                    <li class="hex">
                        <div class="hexIn">
                            <a class="hexLink">
                                <picture>
                                    <img id="bodyclinic-{{$loop->iteration}}" img-id="{{$loop->iteration}}" src="{{url('storage/img/' . $picture->name)}}" >
                                </picture>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </article>
    </div>
</section>

<div class="modal fade" id="aboutGallery" tabindex="-1" aria-labelledby="aboutGalleryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal-img-body"></div>
                <div class="arrow-wrapper arrow-left"><img src="{{url('storage/img/icon-arrow-left.png')}}"></div>
                <div class="arrow-wrapper arrow-right"><img src="{{url('storage/img/icon-arrow-right.png')}}"></div>
            </div>
        </div>
    </div>
</div>

@endsection