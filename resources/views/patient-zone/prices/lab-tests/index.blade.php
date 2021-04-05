@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<span class="line"></span>

<section class="lab-packages-section">

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
                <a href="" download>
                Pełen Cennik badań laboratoryjnych
                <i class="bi bi-arrow-right"></i> 
                </a>
            </div>
        </div>
    <article>
</section>
<!-- <header class="header-basic">
    <div class="header-content">
      <h3>Zapisy online</h3>
    </div>
  </header> -->
<span class="line"></span>
@endsection