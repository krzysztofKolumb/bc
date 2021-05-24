@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<section>
    <div class="section-body bcg border-t">
    <article class="main-content">
            @if($page->section->header)
            <header class="basic-a">
                <h2>{{ $page->section->header }}</h2>
                @if($page->section->content)
                <p>{{ $page->section->content }}</p>
                @endif
            </header>
            @endif
           
            <ul class="main-contact">
                <li>
                    <img src="{{url('storage/img/icon-phone-grad.png')}}" > 
                    <div>
                        <h3>{{ $contact->phone }}</h3>
                    </div> 
                </li>
                <li>
                    <img src="{{url('storage/img/icon-mail-grad.png')}}" > 
                    <div>
                        <h3>{{ $contact->email }}</h3>
                    </div> 
                </li>      
                <li>
                    <img src="{{url('storage/img/icon-location-grad.png')}}" > 
                    <div>
                        <h3>{{ $contact->street }}</h3>
                        <h3>{{ $contact->city }}</h3>
                    </div> 
                </li>       
                <li>
                    <img src="{{url('storage/img/icon-clock-grad.png')}}" > 
                    <div>
                        <h3>Pon.-Pt. {{ $contact->open_week }}</h3>
                        <h3>Sb. {{ $contact->open_sat }}</h3>
                    </div> 
                </li>
            </ul> 
            <ul class="accordion-list">
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>Mapa</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main map">
                              <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.6672566359944!2d21.03215250254361!3d52.249427228029674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecdf44865f839%3A0xd8af31de95d94ee0!2sJ%C3%B3zefa%20Sierakowskiego%204%2C%2003-712%20Warszawa!5e0!3m2!1spl!2spl!4v1613475611881!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </article>
                </li>
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>Dojazd</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main">
                            {!! $contact->access !!}
                            </div>
                        </div>
                    </article>
                </li>
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>Parking</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main">
                            {!! $contact->parking !!}
                            </div>
                        </div>
                    </article>
                </li>
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>Dane Przychodni</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main">
                            {!! $contact->info !!}
                            </div>
                        </div>
                    </article>
                </li>
                <li class="active accordion-item">
                    <article>
                        <header class="accordion-header">
                            <div>
                                <h2>Uwagi i sugestie</h2>
                            </div>
                            <img src="{{url('storage/img/icon-plus.png')}}" >
                        </header>
                        <div class="accordion-body">
                            <div class="body-main">
                            {!! $contact->suggestions !!}
                            </div>
                        </div>
                    </article>
                </li>
            </ul>
    
    
    </article>
        </article>
      
    
          </div>
</section>
@endsection