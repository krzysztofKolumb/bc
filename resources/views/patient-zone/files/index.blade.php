@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="border-t">
    <div class="section-body bcg">
        <article class="main-content">
            @if($section->header)
            <header class="basic-a">
                <h2>{{ $section->header }}</h2>
                <p>{{ $section->content }}</p>
            </header>
            @endif
            <ul class="accordion-list">
            @foreach($categories as $category)
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>{{ $category->name }}</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main files">
                                <ul class="download-files-list">
                                    @foreach($category->files as $file)
                                    <li>
                                        <!-- <div> -->
                                            <!-- <span class="dot">&#9679; </span> -->
                                            <h4>{{ Str::beforeLast($file->title, '.') }}</h4>
                                        <!-- </div> -->
                                        <a href="{{url('storage/files/' . $file->title)}}" download>
                                            Pobierz
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>
        <article>
    </div>
</section>






<!-- <section class="download-files-section">
    @foreach($categories as $category)
    <article>
        <h3>{{ $category->name }}</h3>
        <ul class="download-files">
            @foreach($category->files as $file)
            <li>
                <a href="{{url('storage/files/' . $file->title)}}" download>
                    <div>
                        <span class="dot">&#9679; </span>
                        <h4>{{ Str::beforeLast($file->title, '.') }}</h4>
                    </div>
                    <i class="icon-down-dir-1"></i>
                </a>
            </li>
            @endforeach
        </ul>
    </article>
    @endforeach
</section> -->
@endsection