@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="specialties">
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
</section>
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header> 
<!-- <span class="line"></span> -->
@endsection