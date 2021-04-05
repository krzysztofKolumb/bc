@if($contact->online_registration)
<section class="basic-bcg">
   <article>
      <h3 class="basic">{{ $section->title}}</h3>
   </article>
   <div class="link-wrapper-grad">
        <a href="{{ $contact->online_registration }}">
          Zapisy on-line
          <i class="bi bi-arrow-right"></i> 
        </a>
    </div>
 </section>
 @else
 <span class="line"></span>
 @endif