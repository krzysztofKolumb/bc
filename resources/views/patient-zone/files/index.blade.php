@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<span class="line"></span>

<section class="download-files-section">
    @foreach($categories as $category)
    <article>
        <h3>{{ $category->name }}</h3>
        <ul class="download-files">
            @foreach($category->files as $file)
            <li>
                <a href="{{url('storage/files/' . $file->title . '.' . $file->name)}}" download>
                <h4><span class="dot">&#9679; </span> {{ $file->title }}</h4>
                <i class="icon-down-dir-1"></i></a>
            </li>
            @endforeach
        </ul>
    </article>
    @endforeach
</section>
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header> 
<!-- <span class="line"></span> -->
@endsection