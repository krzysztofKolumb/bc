@if($contact->online_registration)
<section class="online-section">
   <div class="section-body bcg">
      <article>
         <header class="basic-a">
            <h3>{{ $section->header}}</h3>
            @if($section->content)
            <p>{{ $section->content }}</p>
            @endif
         </header>
      </article>
      <div>
         <a class="link link-online" href="{{ $contact->online_registration }}">
            <div><p>Zapisy on-line</p></div>
            <div><img width="40px" src="{{url('storage/img/icon-right-arrowb1.png')}}"></div>
         </a>
      </div>
   </div>
 </section>
 @else
 <span class="line"></span>
 @endif