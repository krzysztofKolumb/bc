@extends('layouts.page')

@include('inc.page-meta')

@section('main')
<span class="line"></span>
<section class="contact">
    <article>
        <header>
<!--            <h1>Skontaktuj się z nami</h1>-->
        </header>
        
        
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
    
    <div class="accordion accordion-flush" id="accordionContact">
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-headingLocation">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLocation" aria-expanded="false" aria-controls="flush-collapseLocation">
        Lokalizacja
      </button>
    </h3>
    <div id="flush-collapseLocation" class="accordion-collapse collapse" aria-labelledby="flush-headingLocation" data-bs-parent="#accordionContact">
      <div class="accordion-body">
        <div class="content-tm">
            {!! $contact->location !!}
        </div>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-map">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMap" aria-expanded="false" aria-controls="flush-collapseMap">
        Mapa
      </button>
    </h3>
    <div id="flush-collapseMap" class="accordion-collapse collapse" aria-labelledby="flush-map" data-bs-parent="#accordionContact">
      <div class="accordion-body">
        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.6672566359944!2d21.03215250254361!3d52.249427228029674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecdf44865f839%3A0xd8af31de95d94ee0!2sJ%C3%B3zefa%20Sierakowskiego%204%2C%2003-712%20Warszawa!5e0!3m2!1spl!2spl!4v1613475611881!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-headingAccess">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseAccess" aria-expanded="false" aria-controls="flush-collapseAccess">
        Dojazd
      </button>
    </h3>
    <div id="flush-collapseAccess" class="accordion-collapse collapse" aria-labelledby="flush-headingAccess" data-bs-parent="#accordionContact">
      <div class="accordion-body">
      <div class="content-tm">
            {!! $contact->access !!}
        </div>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-headingParking">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseParking" aria-expanded="false" aria-controls="flush-collapseParking">
        Parking
      </button>
    </h3>
    <div id="flush-collapseParking" class="accordion-collapse collapse" aria-labelledby="flush-headingParking" data-bs-parent="#accordionContact">
      <div class="accordion-body">
      <div class="content-tm">
            {!! $contact->parking !!}
        </div>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-headingInfo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseInfo" aria-expanded="false" aria-controls="flush-collapseParking">
        Dane Przychodni
      </button>
    </h3>
    <div id="flush-collapseInfo" class="accordion-collapse collapse" aria-labelledby="flush-headingInfo" data-bs-parent="#accordionContact">
      <div class="accordion-body">
      <div class="content-tm">
            {!! $contact->info !!}
        </div>
        </div>
    </div>
  </div>
</div>    

    </article>
</section>
<span class="line"></span>
@endsection