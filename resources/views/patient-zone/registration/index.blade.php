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
                    <section class="flex-body {{$article->class}}">
                        <div class="text-content">
                            {!! $article->content !!}
                        </div>
                        <aside>
                            <ul class="aside-gallery">
                                <!-- @foreach($article->pictures as $picture)
                                    <li><img src="{{url('storage/img/' . $picture->name )}}"></li>
                                @endforeach -->

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
@if( count($profession->employees) > 0 )
<header class="basic-s border-t border-b">
    <div class="header-content">
        <h3>{{ $profession->team }}</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content">
<ul class="team-list">
    @foreach($profession->employees as $employee)
    <li>
        <a>
            <div class="wrap wrap-1">
                <figure>
                  @if($employee->photo)
                      <img src="{{url('storage/photos/' . $employee->photo)}}" >
                  @else
                  <img src="{{url('storage/img/bcg.jpg')}}" >
                  @endif  
                </figure>
            </div>
            <div class="wrap wrap-2">
                <header>
                    <h2>{{ $employee->firstname }} {{ $employee->lastname }}</h2>
                    <h3>{{ $employee->description }}</h3>
                </header>
            </div>
          </a>
      </li>
    @endforeach
</ul>
</article>
@endif
</section>

<section class="border-t">
    <header class="basic-s">
        <div class="header-content">
            <h3>Materiały do pobrania</h3>
            <p>Rejestracja</p>
        </div>
    </header>
    <div class="section-body bcg">
        <article class="main-content">
            <!-- @if($page->section->header)
            <header class="basic-a">
                <h2>{{ $page->section->header }}</h2>
            </header>
            @endif -->

            <div class="article-body">
                <ul class="download-files-list endoscopy">
                    @foreach($files as $file)
                    <li>
                        <h4>{{ Str::beforeLast($file->title, '.') }}</h4>
                        <a href="{{url('storage/files/' . $file->title)}}" download>Pobierz</a>
                    </li>
                    @endforeach
                </ul>
                <!-- <ul class="download-files">
                    @foreach($files as $file)
                    <li>
                        <a href="{{url('storage/files/' . $file->title . '.' . $file->name)}}" download>
                            <div>
                                <span class="dot">&#9679; </span>
                                <h4>{{ $file->title }}</h4>
                            </div>
                            <i class="icon-down-dir-1"></i>
                        </a>
                    </li>
                    @endforeach
                </ul> -->
            </div>
        </article>
    </div>
</section>

@endsection