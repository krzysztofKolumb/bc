<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <!-- Bootstrap 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"> -->
    


    <link href="{{ asset('/css/admin.css') }}" media="all" rel="stylesheet" type="text/css" />

    <!-- Bootstrap 5 -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    
        <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>





    <script src="https://cdn.tiny.cloud/1/l5827vw7aogh95lwv1hv7zqkh893yghbzw0578fqqlziuicp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/l5827vw7aogh95lwv1hv7zqkh893yghbzw0578fqqlziuicp/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
    @livewireStyles
</head>
<style>
    .alert{
      position: fixed;
      bottom: 10px;
      right: 40px;
      z-index: 100;
    }

    .tox-notifications-container {
      display: none;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid nav-flex">
    <!-- <a class="navbar-brand" href="#">BodyClinic</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Zespół
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-experts') }}">Specjaliści</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-employees') }}">Personel</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-recommendations') }}">Rekomendacje</a></li>
            <!-- <li><a class="dropdown-item"><h6>Ustawienia</h6></a></li> -->
            <!-- <li><a class="dropdown-item" href="{{ route('admin-degrees') }}">Stopnie | Tytuły</a></li> -->
            <!-- <li><a class="dropdown-item" href="{{ route('admin-professions') }}">Zawody</a></li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-specialties') }}">Specjalizacje</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-news') }}">Aktualności</a>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Badania kliniczne
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-clinical-trials') }}">Badania kliniczne</a></li>
            <br>
            <li><a class="dropdown-item"><h6>Ustawienia</h6></a></li>
            <li><a class="dropdown-item" href="{{ route('admin-clinical-trials-categories') }}">Kategorie badań klinicznych</a></li>
          </ul>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Cenniki
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-lab-tests') }}">Badania laboratoryjne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-consultations') }}">Konsultacje</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-lab-packages') }}">Pakiety laboratoryjne i diagnostyczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-treatments') }}">Zabiegi</a></li>
            <!-- <br> -->
            <!-- <li><a class="dropdown-item"><h6>Ustawienia</h6></a></li> -->
            <!-- <li><a class="dropdown-item" href="{{ route('admin-lab-test-categories') }}">Badania laboratoryjne - kategorie</a></li> -->
            <!-- <li><a class="dropdown-item" href="{{ route('admin-clinics') }}">Zabiegi - pracownie/poradnie</a></li> -->
          </ul>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Do pobrania
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-files') }}">Materiały</a></li>
            <br>
            <li><a class="dropdown-item"><h6>Ustawienia</h6></a></li>
            <li><a class="dropdown-item" href="{{ route('admin-file-categories') }}">Kategorie</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Obrazy
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-pictures', 'wnetrze-przychodni') }}">Wnętrze przychodni</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-pictures', 'specjalizacje') }}">Specjalizacje</a></li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-text') }}">Teksty</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-faq') }}">FAQ</a>
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Inne
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-clinical-trials') }}">Badania kliniczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-faq') }}">FAQ</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-files') }}">Do pobrania</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-pictures') }}">Obrazy</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-contact') }}">Kontakt</a></li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>





    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul id="main-navbar" class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'home') }}">Strona główna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'o-nas') }}">O nas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Oferta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-page', 'centrum-leczenia-otylosci') }}">Centrum Leczenia Otyłości</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'poradnia-chorob-watroby') }}">Poradnia Chorób Wątroby Hepatolodzy</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'poradnia-medycyny-podrozy') }}">Poradnia Medycyny Podróży Medellan</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'pracownia-endoskopii') }}">Pracownia Endoskopii</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'gastroskopia') }}">Pracownia Endoskopii | Gastroskopia</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'kolonoskopia') }}">Pracownia Endoskopii | Kolonoskopia</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'badania-kliniczne') }}">Badania Kliniczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'diagnostyka-obrazowa') }}">Diagnostyka Obrazowa</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'badania-laboratoryjne') }}">Badania Laboratoryjne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'leczenie-biologiczne') }}">Leczenie Biologiczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'szkolenia') }}">Szkolenia</a></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'specjalizacje') }}">Specjalizacje</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('admin-page', 'zespol') }}">Zespół</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Strefa Pacjenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-page', 'rejestracja') }}">Rejestracja</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'grafik-przyjec') }}">Grafik Przyjęć</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'cennik-konsultacji') }}">Cennik Konsultacji</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'cennik-badan-laboratoryjnych') }}">Cennik Badań Laboratoryjnych</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'pakiety-laboratoryjne') }}">Pakiety Laboratoryjne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'cennik-zabiegow') }}">Cennik Zabiegów</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'do-pobrania') }}">Do pobrania</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'czesto-zadawane-pytania') }}">FAQ</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-page', 'polityka-prywatnosci') }}">Polityka Prywatności</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-page', 'aktualnosci') }}">Aktualności</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-page', 'kontakt') }}">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->




<div class="main-container">
<main >

    
    @if(session()->has('message'))
    <div id="alert" class="alert btn-warning alert-dismissible fade show" role="alert">
  {{ session('message')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        <!-- <div class="alert alert-success">
            {{ session('message')}}
        </div> -->
    @endif

    <div id="alert" class="alert btn-warning alert-dismissible fade" role="alert">
      Zaktualizowano profil!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

    @yield('content')

</main>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script> -->

    <!-- Bootstrap 5 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script> -->


    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script> -->
<script>

// Prevent Bootstrap dialog from blocking focusin
// $(document).on('focusin', function(e) {
//   if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
//     e.stopImmediatePropagation();
//   }
// });

// $(document).on('focusin', function(e) {
//     if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
// 		e.stopImmediatePropagation();
// 	}
// });

// $(document).on('focusin', function(e) {
//   if ($(e.target).closest(".mce-window").length) {
//     e.stopImmediatePropagation();
//   }
// });

// var modal = $('.modal:visible');
//     modal.one('hidden.bs.modal', function() {
//         tinymce.remove('textarea.mce-small');
//     });
//     $(document).off('.tinymodal').on('focusin.tinymodal', function(e) {
//         var dialog = $(e.target).closest(".tox-dialog");
//         if (dialog.length && modal.find(dialog).length === 0) {
//             var wrapper = $('.tox-tinymce-aux');
//             modal.append(wrapper);
//         }
//     });

// $(document).on('focusin', function(e) {
//     if ( $(e.target).closest(".mce-container").length ) {
//         e.stopImmediatePropagation();
//     }
// });

// $(document).on('focusin', function(e) {
//     if ($(e.target).closest(".tox-dialog").length) {
//         e.stopImmediatePropagation();
//     }
// });

// $.widget("ui.dialog", $.ui.dialog, {
//     _allowInteraction: function(event) {
//         return !!$(event.target).closest(".mce-container").length || this._super( event );
//     }
// });

$(document).ready(function(){

//   jQuery.event.special.touchstart = {
//   setup: function( _, ns, handle ) {
//       this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
//   }
// };


  initEditor();

  function initEditor(){
    var el = $('textarea.editor').attr('id');
      tinymce.init({
      language: 'pl',
      selector: '#' + el,
      height: '400px',
      menubar: 'edit',
      plugins: 'link lists powerpaste',
      // toolbar: 'styleselect | fontsizeselect',
      toolbar: 'undo redo | pastetext | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false
    });
  }

$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .mce-window, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});

var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
$.fn.bootstrapBtn = bootstrapButton // give $().bootstrapBtn the Bootstrap functionality

  // $('.tm-modal').on('show.bs.modal', function(event){
//   var selector = $(this).find('.tm-editor').attr('id');
//   tinymce.init({
//       selector: '#' + selector,
//       height: '400px',
//     });
// })



  // tinymce.init({
  //     selector:'#textarea-expert-education',
  //     language: 'pl',
  //     height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    // });



  
  //Powiadomienia z Livewire

  window.addEventListener('alert', event => {
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
      setTimeout(function(){
        $('#alert').removeClass('show');
      }, 3500);
  })

  window.addEventListener('open-modal', event => {
    var modalId = event.detail.message;
    var modalTitle = event.detail.title;
    $("#" + modalId).modal('show');
    $("#modal-title").text(modalTitle);
  })

  window.addEventListener('close-modal', event => {
  $('.modal').modal('hide');
  $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
})

// Livewire.on('warning', x => {
//   $('#clinical-trial-title').val(x.title);
//   $('#CTcategory').val(x.clinical_trial_category_id);
//   $('textarea').val(x.content);
// })

// window.addEventListener('editor', event => {
//   initEditor();
// })

  // window.addEventListener('close', event => {
  //     $('.modal').modal('hide');
  //     $('#alert').addClass('show');
  //     setTimeout(function(){
  //         $('#alert').removeClass('show');
  //     }, 3500);

  //   })

// Edycja profilu eksperta bez edytora tekstu
$('.form-expert-profile').on( "submit", function(e) {
var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
    }
  });
  e.preventDefault();

})

  // Edycja profilu eksperta z edytorem tekstu
  $('.form-expert-profile-tm').on( "submit", function(e) {
    var content = tinyMCE.activeEditor.getContent();
    $(this).find('textarea').val(content);
    var dataString = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "",
        data: dataString,
        success: function () {
          $('#alert').addClass('show');
          setTimeout(function(){
              $('#alert').removeClass('show');
        }, 3500);
        }
      });
      e.preventDefault();
  })


});






$('#form-employee-new').on( "submit", function(e) {

var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      // $(".modal").toggle();
      // $('body').removeClass('modal-open');
      // $('.modal-backdrop').remove();
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
  }, 3500);

      // $("#contact_form").html("<div id='message'></div>");
      // $("#message")
      //   .html("<h2>Contact Form Submitted!</h2>")
      //   .append("<p>We will be in touch soon.</p>")
      //   .hide()
      //   .fadeIn(1500, function () {
      //     $("#message").append(
      //       "<img id='checkmark' src='images/check.png' />"
      //     );
      //   });
    }
  });
  e.preventDefault();

})

///////////////////////////////////////////////////////////////////////////////////////////////////
// BADANIA KLINICZNE

$('#clinical-trial-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-new-clinical-trial',
      height: '400px',
    });
})

$('#new-clinical-trial-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  var category = $(this).find('select').val();
  $(this).find('textarea').val(content);
  Livewire.emit('store', title, category, content);
  event.preventDefault();
})


///////////////////////////////////////////////////////////////////////////////////////////////////
// Pakiety Laboratoryjne

$('#lab-package-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-lab-package',
      height: '400px',
    });
})

$('#lab-package-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var price = $(this).find('input[name="price"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  Livewire.emit('store', title, price, content);
  event.preventDefault();
})

///////////////////////////////////////////////////////////////////////////////////////////////////
// AKTUALNOSCI


$('#post-modal').on('show.bs.modal', function(event){
  // tinyMCE.activeEditor.remove();

  tinymce.init({
      selector:'#textarea-post',
      height: '400px',
    });
})

$('#post-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  Livewire.emit('store', title, content);
  event.preventDefault();
})

///////////////////////////////////////////////////////////////////////////////////////////////////
// FAQ


$('#faq-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector: '#answear-editor',
      height: '400px',
    });
})

$('#faq-form').on('submit', function(event){
  var title = $(this).find('input[name="question"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  Livewire.emit('store', title, content);
  event.preventDefault();
})

///////////////////////////////////////////////////////////////////////////////////////////////////
// KONSULTACJE


$('#consultation-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector: '#textarea-consultation',
      height: '400px',
    });
})

$('#consultation-form').on('submit', function(event){
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  Livewire.emit('store', content);
  event.preventDefault();
})

///////////////////////////////////////////////////////////////////////////////////////////////////
// EDITOR MODAL

$('#editor-modal').on('show.bs.modal', function(event){
  tinymce.init({
      language: 'pl',
      selector:'#textarea-editor-mamo',
      height: '400px',
      menubar: false,
      plugins: 'autolink link lists paste',
      // toolbar: 'styleselect | fontsizeselect',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
      link_class_list: [
        {title: 'None', value: ''},
        {title: 'External Link', value: 'ext_link'},
        {title: 'Internal Support Link', value: 'int_sup_link'},
        {title: 'Internal Marketing Link', value: 'int_mark_link'},
        {title: 'Other Internal Link', value: 'int_other_link'}
      ],
      // link_list: [
      //   {title: 'Pracownia Endoskopii', value: '../oferta/pracownia-endoskopii'},
      //   {title: 'Tiny Blog', value: 'https://www.tiny.cloud/blog'},
      //   {title: 'TinyMCE Documentation', value: 'https://www.tiny.cloud/docs/'},
      //   {title: 'TinyMCE on Stack Overflow', value: 'https://stackoverflow.com/questions/tagged/tinymce'},
      //   {title: 'TinyMCE GitHub', value: 'https://github.com/tinymce/'}
      // ]
      link_list: [
          {title: 'Zapisy on-line', value: 'https://bodyclinic.erejestracja.eu/'},
          {title: 'Oferta', value: 'https://www.tiny.cloud/blog', 
            menu: [
              {title: 'Centrum Leczenia Otyłości', value: '../oferta/centrum-leczenia-otylosci'},
              {title: 'Poradnia Chorób Wątroby Hepatolodzy', value: '../oferta/poradnia-chorob-watroby'},
              {title: 'Poradnia Medycyny Podróży Medellan', value: '../oferta/poradnia-medycyny-podrozy'},
              {title: 'Pracownia Endoskopii', value: '../oferta/pracownia-endoskopii'},
              {title: 'Diagnostyka Obrazowa', value: '../oferta/diagnostyka-obrazowa'},
              {title: 'Badania Kliniczne', value: '../oferta/badania-kliniczne'},
            ]
          },
          {title: 'Specjaliści',
            menu: [
              {title: 'prof. dr hab. med. Krzysztof Paśnik', value: '../zespol/krzysztof-pasnik'},
              {title: 'dr med. Jan Gietka', value: '../zespol/jan-gietka'},
              {title: 'lek. Piotr Gietka', value: '../zespol/piotr-gietka'},
              {title: 'lek. Wojciech Gietka', value: '../zespol/wojciech-gietka'},
              {title: 'dr med. Jakub Klapaczyński', value: '../zespol/jakub-klapaczynski'},
            ]
          }
      ],
      rel_list: [
        {title: 'Follow', value: 'follow'},
        {title: 'No Follow', value: 'nofollow'}
      ]
      });
})

$('#editor-form').on('submit', function(event){
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  Livewire.emit('updateContent', content);
  event.preventDefault();
})

$('#section-modal-editor').on('show.bs.modal', function(event){
  tinymce.init({
      language: 'pl',
      selector:'#textarea_section',
      height: '400px',
      menubar: false,
      plugins: 'autolink link lists paste',
      // toolbar: 'styleselect | fontsizeselect',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
      link_class_list: [
        {title: 'None', value: ''},
        {title: 'External Link', value: 'ext_link'},
        {title: 'Internal Support Link', value: 'int_sup_link'},
        {title: 'Internal Marketing Link', value: 'int_mark_link'},
        {title: 'Other Internal Link', value: 'int_other_link'}
      ],
      // link_list: [
      //   {title: 'Pracownia Endoskopii', value: '../oferta/pracownia-endoskopii'},
      //   {title: 'Tiny Blog', value: 'https://www.tiny.cloud/blog'},
      //   {title: 'TinyMCE Documentation', value: 'https://www.tiny.cloud/docs/'},
      //   {title: 'TinyMCE on Stack Overflow', value: 'https://stackoverflow.com/questions/tagged/tinymce'},
      //   {title: 'TinyMCE GitHub', value: 'https://github.com/tinymce/'}
      // ]
      link_list: [
          {title: 'Zapisy on-line', value: 'https://bodyclinic.erejestracja.eu/'},
          {title: 'Oferta', value: 'https://www.tiny.cloud/blog', 
            menu: [
              {title: 'Centrum Leczenia Otyłości', value: '../oferta/centrum-leczenia-otylosci'},
              {title: 'Poradnia Chorób Wątroby Hepatolodzy', value: '../oferta/poradnia-chorob-watroby'},
              {title: 'Poradnia Medycyny Podróży Medellan', value: '../oferta/poradnia-medycyny-podrozy'},
              {title: 'Pracownia Endoskopii', value: '../oferta/pracownia-endoskopii'},
              {title: 'Diagnostyka Obrazowa', value: '../oferta/diagnostyka-obrazowa'},
              {title: 'Badania Kliniczne', value: '../oferta/badania-kliniczne'},
            ]
          },
          {title: 'Specjaliści',
            menu: [
              {title: 'prof. dr hab. med. Krzysztof Paśnik', value: '../zespol/krzysztof-pasnik'},
              {title: 'dr med. Jan Gietka', value: '../zespol/jan-gietka'},
              {title: 'lek. Piotr Gietka', value: '../zespol/piotr-gietka'},
              {title: 'lek. Wojciech Gietka', value: '../zespol/wojciech-gietka'},
              {title: 'dr med. Jakub Klapaczyński', value: '../zespol/jakub-klapaczynski'},
            ]
          }
      ],
      rel_list: [
        {title: 'Follow', value: 'follow'},
        {title: 'No Follow', value: 'nofollow'}
      ]
      });
})

$('#article-modal').on('show.bs.modal', function(event){
  tinymce.init({
      language: 'pl',
      selector:'#textarea_article',
      height: '500px',
      menubar: false,
      plugins: 'autolink link lists paste',
      // toolbar: 'styleselect | fontsizeselect',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
      link_class_list: [
        {title: 'None', value: ''},
        {title: 'External Link', value: 'ext_link'},
        {title: 'Internal Support Link', value: 'int_sup_link'},
        {title: 'Internal Marketing Link', value: 'int_mark_link'},
        {title: 'Other Internal Link', value: 'int_other_link'}
      ],
      // link_list: [
      //   {title: 'Pracownia Endoskopii', value: '../oferta/pracownia-endoskopii'},
      //   {title: 'Tiny Blog', value: 'https://www.tiny.cloud/blog'},
      //   {title: 'TinyMCE Documentation', value: 'https://www.tiny.cloud/docs/'},
      //   {title: 'TinyMCE on Stack Overflow', value: 'https://stackoverflow.com/questions/tagged/tinymce'},
      //   {title: 'TinyMCE GitHub', value: 'https://github.com/tinymce/'}
      // ]
      link_list: [
          {title: 'Zapisy on-line', value: 'https://bodyclinic.erejestracja.eu/'},
          {title: 'Oferta', value: 'https://www.tiny.cloud/blog', 
            menu: [
              {title: 'Centrum Leczenia Otyłości', value: '../oferta/centrum-leczenia-otylosci'},
              {title: 'Poradnia Chorób Wątroby Hepatolodzy', value: '../oferta/poradnia-chorob-watroby'},
              {title: 'Poradnia Medycyny Podróży Medellan', value: '../oferta/poradnia-medycyny-podrozy'},
              {title: 'Pracownia Endoskopii', value: '../oferta/pracownia-endoskopii'},
              {title: 'Diagnostyka Obrazowa', value: '../oferta/diagnostyka-obrazowa'},
              {title: 'Badania Kliniczne', value: '../oferta/badania-kliniczne'},
            ]
          },
          {title: 'Specjaliści',
            menu: [
              {title: 'prof. dr hab. med. Krzysztof Paśnik', value: '../zespol/krzysztof-pasnik'},
              {title: 'dr med. Jan Gietka', value: '../zespol/jan-gietka'},
              {title: 'lek. Piotr Gietka', value: '../zespol/piotr-gietka'},
              {title: 'lek. Wojciech Gietka', value: '../zespol/wojciech-gietka'},
              {title: 'dr med. Jakub Klapaczyński', value: '../zespol/jakub-klapaczynski'},
            ]
          }
      ],
      rel_list: [
        {title: 'Follow', value: 'follow'},
        {title: 'No Follow', value: 'nofollow'}
      ]
      });
})

$('#section-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var subtitle = $(this).find('input[name="subtitle"]').val();
  var header = $(this).find('textarea[name="header"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('#textarea_section').val(content);
  Livewire.emit('store', title, subtitle, header, content);
  event.preventDefault();
})

$('#article-form').on('submit', function(event){
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('#textarea_article').val(content);
  Livewire.emit('storeArticle', content);
  event.preventDefault();
})

// $('#file-modal input[type="file"]').change(function(e) {
  $('#file').change(function(e) {
      var name = e.target.files[0].name;
      var extension = name.replace(/^.*\./, '');
      Livewire.emit('change', name, extension);
  });

  // $('#file-modal').on('show.bs.modal', function(event){
  //   $('#file').val("");
  //   var name = $('#file').val();
    // alert(name);
    // Livewire.emit('resetName');
// })







// $('.tm-modal').on('show.bs.modal', function(event){
//   var selector = $(this).find('.tm-editor').attr('id');
//   tinymce.init({
//       selector: '#' + selector,
//       height: '400px',
//     });
// })

// $('#post-update-form').on('submit', function(event){
//   var title = $(this).find('input[name="title"]').val();
//   var content = tinyMCE.activeEditor.getContent();
//   $(this).find('textarea').val(content);
//   var dataString = $(this).serialize();
// $.ajax({
//     type: "POST",
//     url: "",
//     data: dataString,
//     success: function () {
//       $('#alert').text('Zapisano zmiany!');
//       $('#post-update-title').text(title);
//       $('#alert').addClass('show');
//       setTimeout(function(){
//           $('#alert').removeClass('show');
//       }, 3500);
//       $('.modal').modal('hide');
//     }
//   });
//   event.preventDefault();
// })

// window.addEventListener('livewire-upload-finish', event => {
//   Livewire.emit('change');
// })



</script>




<script>
    $(document).ready(function() {

        $('#form').modal(options);

        var options = {
            'backdrop' : 'static',
            'show' : 'true'
        }

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);


        // window.addEventListener('next', event => {
        // // $('#form-new-expert').modal('show');
  

        // // $(".next").click(function(){

        //     current_fs = $(this).parent();
        //     next_fs = $(this).parent().next();

        //     //Add Class Active
        //     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //     //show the next fieldset
        //     next_fs.show();
        //     //hide the current fieldset with style
        //     current_fs.animate({opacity: 0}, {
        //         step: function(now) {
        //             // for making fielset appear animation
        //             opacity = 1 - now;
        //             current_fs.css({
        //                 'display': 'none',
        //                 'position': 'relative'
        //             });
        //             next_fs.css({'opacity': opacity});
        //         },
        //             duration: 500
        //     });
        //     setProgressBar(++current);
        // // });

        // })

        $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
        }

        $(".submit").click(function(){
            return false;
        })

        $(window).on('next', function(){

    // window.addEventListener('next', event => {
        // alert('mamo');
        // $('#form-new-expert').modal('show');
  

        // $(".next").click(function(){

            current_fs = $('#stepOne');
            next_fs = $('#stepTwo');

            $('#stepOne').hide();
            $('#stepTwo').show();



            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            // next_fs.show();
            //hide the current fieldset with style
            // current_fs.animate({opacity: 0}, {
            //     step: function(now) {
            //         // for making fielset appear animation
            //         opacity = 1 - now;
            //         current_fs.css({
            //             'display': 'none',
            //             'position': 'relative'
            //         });
            //         next_fs.css({'opacity': opacity});
            //     },
            //         duration: 500
            // });
            // setProgressBar(++current);
        // });
    });

        $(window).on('stepTwo', function(){

            $current_fs = $('#stepTwo');
            $next_fs = $('#stepThree');

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index($next_fs)).addClass("active");

            alert('step Two');
            //show the next fieldset
            $next_fs.show();
            //hide the current fieldset with style
            $current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    $current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    $next_fs.css({'opacity': opacity});
                },
                    duration: 500
            });
        });

    })
</script>  

<script>


    // window.addEventListener('hide-form', event => {
    //     $('#form').modal('hide');
    //     $('#alert').removeClass('hide-alert');
    //     setTimeout(function(){
    //         $('#alert').addClass('hide-alert');
    // }, 3500);

    // })

    // window.addEventListener("user-deleted", (event) => {
    //     alert(`${event.detail.user_name} was deleted!`);
    // });


/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// window.addEventListener('init-editor', event => {
//   var editor = event.detail.editor;
//   tinymce.init({
//       selector: editor,
//       height: '400px',
//     });
// })


// window.addEventListener('open-delete-modal', event => {
//   var modalId = event.detail.message;
//   $("#" + modalId).modal('show');

// })

// window.addEventListener('close-delete-modal', event => {
//   $('.modal').modal('hide');
//   $('#alert').text(event.detail.message);
//       $('#alert').addClass('show');
//         setTimeout(function(){
//             $('#alert').removeClass('show');
//     }, 3500);

// })

    // $('.edit-employee-button').on('click', function(event){
    //   // e.preventDefault();
    //   button = event.target;
    //   var id = button.getAttribute('employee-id');
    //     window.livewire.emit('current', {'id': id}); 
    //     setTimeout(function(){
    //       $('#edit-employee-modal').modal('show');
    // }, 400);
    // })

    // $('.delete-employee-button').on('click', function(event){
    //   button = event.target;
    //   var id = button.getAttribute('employee-id');
    //     window.livewire.emit('deleteModal', {'id': id}); 
    //     setTimeout(function(){
    //       $('#delete-employee-modal').modal('toggle');
    // }, 400);
    // })

//     $(window).load(function(){
//    setTimeout(function(){
//     $('#edit-employee-modal').modal('show');
//    }, 5000);
// });


  //   $('#edit-employee-modal').on('show.bs.modal', function(event){
  //     // event.preventDefault();
  //     $(this).hide();
  //     // setTimeout(function(){
  //         // Button that triggered the modal
  // var button = event.relatedTarget
  // // Extract info from data-bs-* attributes
  // var id = button.getAttribute('employee-id')
  //       window.livewire.emit('current', {'id': id});      
  //   // }, 3500);
  //   setTimeout(function(){

  //   $(this).show();
  //       }, 3500);

  //   })

</script>



@livewireScripts
</body>
</html>