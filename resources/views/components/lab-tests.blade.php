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
                        <div class="body-main">
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
                                    <p class="lab-test-special-price">Cena z kartą rabatową <br> BC (pln)</p>
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
                </article>
            </li>
            @endforeach
        </ul>




        <!-- <div class="accordion accordion-flush" id="accordion-lab-tests">
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
                                <p class="lab-test-special-price">Cena z kartą rabatową <br> BC (pln)</p>
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
        </div> -->

    <article>

    <div>
        <a class="link link-lab-tests" href="{{url('storage/files/' . $file->title)}}" download>
            <div><p>Pełen Cennik badań laboratoryjnych</p></div>
            <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
        </a>
    </div>

</div>