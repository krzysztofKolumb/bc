@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="specialties">
    <div class="section-body">
        <article class="main-content">
            <header class="basic-a">
            @if($section->header)
                <h2>{{ $section->header }}</h2>
            @endif
            @if($section->content)
                <p>{{ $section->content }}</p>
            @endif
            </header>
            <div class="article-body">
                <ul class="hexGrid">
                @foreach($specialties->chunk(3) as $chunk)
                    @foreach($chunk as $specialty)
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="{{ route('specialty', [$specialty->slug]) }}">
                            <picture>
                            </picture>
                            <div class="hexContent">
                                    <h2>{{ $specialty->name }}</h2>
                                    <p>Some sample text about the article this hexagon leads to</p>
                            </div>
                        </a>
                        </div>
                    </li>
                    @endforeach
                    @if( count($pictures) > $loop->index)
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink">
                            <picture>
                            <img src="{{url('storage/img/' . $pictures[$loop->index]->name)}}" >
                            </picture>
                        </a>
                        </div>
                    </li>
                    @endif
                @endforeach
                </ul>
            </div>  
        </article>
    </div>
</section>

@endsection