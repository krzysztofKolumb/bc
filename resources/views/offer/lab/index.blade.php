@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section class="content">
    <article>
        <div class="content-tm">
        {!! $desc->content !!}
        <div>
        <aside>
        </aside>
    </article>
</section>

<section>   
@if( count($profession->employees) > 0 )
<header class="header-basic">
    <div class="header-content">
        <h3>{{ $profession->team }}</h3>
        <p>Zespół</p>
    </div>
</header>
<article class="team-content">
<ul class="team-list">
    @foreach($profession->employees as $employee)
    <li>
        <article>
            <a>
            <figure>
                @if($employee->photo)
                    <img src="{{url('storage/photos/' . $employee->photo)}}" >
                @else
                <div class="photo-prev"></div>
                @endif  
                </figure>
                <h2>{{ $employee->firstname }} {{ $employee->lastname }}</h2>
                <h3>
                    {{ $employee->description }}
                </h3>
            </a>
        </article>   
    </li>
    @endforeach
</ul>
</article>
@endif
</section>

<section class="lab-packages-section">
    <header class="header-basic">
        <div class="header-content">
            <h3>Pakiety laboratoryjne i diagnostyczne</h3>
            <p>Cennik</p>
        </div>
    </header>

    <article class="lab-packages-desc">
        <div class="accordion accordion-flush" id="accordion-lab-packages">
            @foreach($packages as $package)
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-lab-package-{{$package->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-lab-package-{{$package->id}}" aria-expanded="false" aria-controls="flush-collapse-lab-package-{{$package->id}}">
                    <div id="accordion-button-div">
                        <span>{{ $package->title }}</span>
                        <span class="package-price">{{ $package->price }} pln</span>
                    </div>
                </button>
                </h2>
                <div id="flush-collapse-lab-package-{{$package->id}}" class="accordion-collapse collapse" aria-labelledby="flush-lab-package-{{$package->id}}" data-bs-parent="#accordion-lab-packages">
                <div class="accordion-body">
                    <div class="content-tm">
                        {!! $package->content !!}
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    <article>
</section>

<section class="lab-packages-section">
    <header class="header-basic">
        <div class="header-content">
            <h3>Badania laboratoryjne</h3>
            <p>Cennik</p>
        </div>
    </header>

    <article class="lab-packages-desc">
        <div class="accordion accordion-flush" id="accordion-lab-tests">
            @foreach($categories as $category)
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-lab-test-category-{{$category->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-lab-test-category-{{$category->id}}" aria-expanded="false" aria-controls="flush-collapse-lab-test-category-{{$category->id}}">
                    <div id="accordion-button-div">
                        <span>{{ $category->name }}</span>
                    </div>
                </button>
                </h2>
                <div id="flush-collapse-lab-test-category-{{$category->id}}" class="accordion-collapse collapse" aria-labelledby="flush-lab-test-category-{{$category->id}}" data-bs-parent="#accordion-lab-tests">
                <div class="accordion-body">
                    <div>

                    <ul class="price-list">
                        <li class="mobile">
                            <p class="lab-test-name"></p>
                            <p class="lab-test-load-time">Czas<br> (dzień)</p>
                            <p class="lab-test-regular-price">Cena<br> (pln)</p>
                            <p class="lab-test-special-price">Cena BC<br>(pln)</p>
                        </li>
                        <li class="desctop">
                            <p class="lab-test-name"></p>
                            <p class="lab-test-load-time">Czas oczekiwania <br> (dzień)</p>
                            <p class="lab-test-regular-price">Cena podstawowa <br> (pln)</p>
                            <p class="lab-test-special-price">Cena dla pacjentów <br> BC (pln)</p>
                        </li>
                        @foreach($category->labTestPrices as $price)
                        <li>
                            <p class="lab-test-name">{{ $price->name }} </p>
                            <p class="lab-test-load-time">{{ $price->load_time }}</p>
                            <p class="lab-test-regular-price">{{ $price->regular_price }}</p>
                            <p class="lab-test-special-price">{{ $price->special_price }}</p>
                        </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="lab-test-price-file">
            <div class="link-wrapper-grad">
                <a href="{{url('storage/files/' . $file->title . '.' . $file->name)}}" download>
                Pełen Cennik badań laboratoryjnych
                <i class="bi bi-arrow-right"></i> 
                </a>
            </div>
        </div>
    <article>
</section>
<span class="line"></span>
@endsection