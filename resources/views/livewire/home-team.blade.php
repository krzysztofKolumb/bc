<div>
  <article>
    <ul class="team-list">
    @foreach($experts as $expert)
      <li class="fade">
        <a href="{{ route('expert-profile', [$expert->slug]) }}">
            <div class="wrap wrap-1">
                <figure>
                  @if($expert->photo)
                      <img src="{{url('storage/photos/' . $expert->photo)}}" >
                  @else
                      <div class="photo-prev"></div>
                  @endif  
                </figure>
            </div>
            <div class="wrap wrap-2">
                <header>
                    <h2>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h2>
                    <h3>
                    @foreach($expert->specialties as $specialty)
                        @if ($loop->last)
                        {{ $specialty->name }}
                        @else
                        {{ $specialty->name }},
                        @endif
                    @endforeach
                    </h3>
                </header>
            </div>
          </a>
      </li>
      @endforeach
    </ul>

    <div>
        <a class="link link-team" href="{{ route('team') }}">
          <div><p>Cały zespół</p></div>
          <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
        </a>
    </div>
  </article>
</div>
