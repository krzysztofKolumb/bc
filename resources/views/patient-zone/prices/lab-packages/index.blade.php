@extends('layouts.page')

@include('inc.page-meta')

@section('main')

<span class="line"></span>

<section class="lab-packages-section">

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
<header class="header-basic header-online">
        <div class="header-content">
            <h3>Zapisy online</h3>
        </div>
</header> 
<!-- <span class="line"></span> -->
@endsection