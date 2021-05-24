<div class="section-body bcg">

    <article class="main-content">
        @if($section->header)
        <header class="basic-a">
            <h2>{{ $section->header }}</h2>
            <p>{{ $section->content }}</p>
        </header>
        @endif


        <ul class="accordion-list">
            @foreach($packages as $package)
            <li class="active accordion-item">
                <article>
                    <header class="accordion-header lab-package">
                        <div>
                            <h2>{{ $package->title }}</h2>
                            <p>{{ $package->price }} pln</p>
                        </div>
                        <img src="{{url('storage/img/icon-plus.png')}}" >
                    </header>
                    <div class="accordion-body">
                        <div class="body-main">
                        {!! $package->content !!}
                        </div>
                    </div>
                </article>
            </li>
            @endforeach
        </ul>


        <!-- <div class="accordion accordion-flush" id="accordion-lab-packages">
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
        </div> -->
    <article>
</div>