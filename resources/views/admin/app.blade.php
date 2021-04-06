<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">


    <link href="{{ asset('/css/admin.css') }}" media="all" rel="stylesheet" type="text/css" />

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
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BodyClinic</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin') }}">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-experts') }}">Experci</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-employees') }}">Personel</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-degrees') }}">Stopnie/Tytuły</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-professions') }}">Zawody</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Zespół
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-experts') }}">Experci</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-employees') }}">Personel</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-degrees') }}">Stopnie/Tytuły</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-professions') }}">Zawody</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-specialties') }}">Specjalizacje</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Badania kliniczne
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-clinical-trials') }}">Badania kliniczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-clinical-trials-categories') }}">Kategorie badań</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cennik
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-lab-tests') }}">Badania laboratoryjne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-lab-test-categories') }}">Badania laboratoryjne - kategorie</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-employees') }}">Konsultacje</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-lab-packages') }}">Pakiety laboratoryjne i diagnostyczne</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-treatments') }}">Zabiegi</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-clinics') }}">Zabiegi - pracownie/poradnie</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Do pobrania
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-files') }}">Materiały</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-file-categories') }}">Kategorie</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-news') }}">Aktualności</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-faq') }}">FAQ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Strony
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('admin-files') }}">Strona główna</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-file-categories') }}">O nas</a></li>
            <li><a class="dropdown-item" href="{{ route('admin-file-categories') }}">Kontakt</a></li>

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-news') }}">RODO</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="main-container">
<main >

    
    @if(session()->has('message'))
    <div class="alert btn-warning alert-dismissible fade show" role="alert">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>

<script>

// Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});

$(document).ready(function(){
  tinymce.init({
      selector:'#textarea-expert-education',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-expert-certificates',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-expert-awards',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-expert-help',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-expert-other',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

  tinymce.init({
      selector:'#lab-package-update-editor',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });  

    tinymce.init({
      selector:'#textarea-clinical-trial',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-post-update',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-post-update',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#editor-faq-update',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-expert-experience',
      language: 'pl',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

    tinymce.init({
      selector:'#textarea-expert-consultations',
      language: 'pl',
      language: 'pl',
      height: '400px',
      // menubar: false,
      // plugins: 'link lists',
      // // toolbar: 'styleselect | fontsizeselect',
      // toolbar: 'undo redo | h2 h3 h4 h5 h6 | bold italic underline | numlist bullist | forecolor alignleft aligncenter alignright | link',
      // fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt'
    });

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
    $("#" + modalId).modal('show');

  })

  window.addEventListener('close-modal', event => {
  $('.modal').modal('hide');
  $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
})

  window.addEventListener('close', event => {
      $('.modal').modal('hide');
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);

    })

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



$('.form-clinical-trial-tm').on( "submit", function(e) {

var content = tinyMCE.activeEditor.getContent();
$(this).find('textarea').val(content);
var title = $(this).find('input[name="title"]').val();
var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      // $(".modal").toggle();
      // $('body').removeClass('modal-open');
      // $('.modal-backdrop').remove();
      $('#clinical-trial-title').text(title);
      $('#alert').text('Zapisano zmiany!');
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
  }, 3500);
  $('.modal').modal('hide');

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

$('#modal-new-clinical-trial').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-new-clinical-trial',
      height: '400px',
    });
})

$('#new-clinical-trial-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  var category = $(this).find('select').val();
  // Livewire.emit('store', title, category, content);
  // $('.modal').modal('hide');
  $(this).find('textarea').val(content);
  var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      // $(".modal").toggle();
      // $('body').removeClass('modal-open');
      // $('.modal-backdrop').remove();
      $('#alert').text('Dodano badanie!');
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      Livewire.emit('update');
      // $(this).find('input[name="title"]').val('mamo');
      $('#new-clinical-trial-form')[0].reset();
      $('.modal').modal('hide');

    // Livewire.refresh('clinicalTrials');

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
  event.preventDefault();
})

$('#modal-new-lab-package').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-new-lab-package',
      height: '400px',
    });
})

$('#new-post-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-new-post',
      height: '400px',
    });
})

// $('.tm-modal').on('show.bs.modal', function(event){
//   var selector = $(this).find('.tm-editor').attr('id');
//   tinymce.init({
//       selector: '#' + selector,
//       height: '400px',
//     });
// })

$('#faq-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector: '#answear-editor',
      height: '400px',
    });
    $(this).find('form')[0].reset();
    tinyMCE.activeEditor.setContent('');
})

$('#new-lab-package-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  var price = $(this).find('input[name="price"]').val();
  $(this).find('textarea').val(content);
  var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').text('Dodano pakiet!');
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      Livewire.emit('updateList');
      $('#new-lab-package-form')[0].reset();
      $('.modal').modal('hide');
    }
  });
  event.preventDefault();
})

$('#lab-package-update-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  var price = $(this).find('input[name="price"]').val();
  $(this).find('textarea').val(content);
  var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').text('Zapisano zmiany!');
      $('#lab-package-title').text(title);
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      $('.modal').modal('hide');
    }
  });
  event.preventDefault();
})

$('#new-post-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').text('Dodano post!');
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      Livewire.emit('updateList');
      $('#new-post-form')[0].reset();
      $('.modal').modal('hide');
    }
  });
  event.preventDefault();
})

$('#post-update-form').on('submit', function(event){
  var title = $(this).find('input[name="title"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').text('Zapisano zmiany!');
      $('#post-update-title').text(title);
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      $('.modal').modal('hide');
    }
  });
  event.preventDefault();
})

$('#faq-form').on('submit', function(event){
  var question = $(this).find('input[name="question"]').val();
  var answear = tinyMCE.activeEditor.getContent();
  $(this).find('#answear-editor').val(answear);
  var textarea = $(this).find('#answear-editor').val();
  var dataString = $(this).serialize();
  // Livewire.emit('store', question, answear);
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').text('Dodano FAQ!');
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      Livewire.emit('updateList');
      $('#faq-form')[0].reset();
      $('.modal').modal('hide');
    }
  });
  event.preventDefault();
})

$('#faq-form-update').on('submit', function(event){
  var title = $(this).find('input[name="question"]').val();
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('textarea').val(content);
  var dataString = $(this).serialize();
$.ajax({
    type: "POST",
    url: "",
    data: dataString,
    success: function () {
      $('#alert').text('Zapisano zmiany!');
      $('#faq-question').text(title);
      $('#alert').addClass('show');
      setTimeout(function(){
          $('#alert').removeClass('show');
      }, 3500);
      $('.modal').modal('hide');
    }
  });
  event.preventDefault();
})






$('#exampleModal').on("show.bs.modal", function(event){
  var button = event.relatedTarget;
  var selectedItem = button.getAttribute('data-bs-id');
  $(this).find('input[name="id"]').val(selectedItem);
  // var dataString = $(this).serialize();
  // alert(dataString);
  
// alert($(this).find('input[name="id"]').val());
})

$('#form-clinical-trial-deletee').on('submit', function(e){
  e.preventDefault();

  $(this).find('input[name="id"]').val();
  var dataString = $(this).serialize();
  // alert(dataString);
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
  $('.modal').modal('hide');

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
})

$('#mamo').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-mamo',
      height: '400px',
    });
})

$('#mamo-btn').on('click', function(e){
  e.preventDefault();
  var content = tinyMCE.activeEditor.getContent();
  Livewire.emit('mamo', content);
  $('.modal').modal('hide');
})

















window.addEventListener('livewire-upload-finish', event => {
  Livewire.emit('change');
})



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



    $('.btn-close').click( function() {
        $('#alert').addClass('hide-alert')
    });

    // $('#new-employee-button').on("click", function(e) {
    //   e.preventDefault();
    // });


    // window.addEventListener('show-form-new-expert', event => {
    //     $('#form-new-expert').modal('show');
    // })

    window.addEventListener('hide-form', event => {
        $('#form').modal('hide');
        $('#alert').removeClass('hide-alert');
        setTimeout(function(){
            $('#alert').addClass('hide-alert');
    }, 3500);

    })

    window.addEventListener("user-deleted", (event) => {
        alert(`${event.detail.user_name} was deleted!`);
    });

    // window.addEventListener('next', event => {
    //     // $('#form-new-expert').modal('show');
    // })


    // window.addEventListener('show-delete-modal', event => {
      // $('#delete-employee-modal .modal-body').text(event.detail.message);
    //   $('#delete-employee-modal').modal('show');
    // })

    // window.addEventListener('hide-delete-modal', event => {
    //   $('#delete-employee-modal').modal('hide');
    //   $('#alert').text(event.detail.message);
    //   $('#alert').addClass('show');
    //     setTimeout(function(){
    //         $('#alert').removeClass('show');
    // }, 3500);

    // })

    // window.addEventListener('hide-edit-employee-modal', event => {
    //   $('#edit-employee-modal').modal('toggle');
    //   $('#alert').text(event.detail.message);
    //   $('#alert').addClass('show');
    //     setTimeout(function(){
    //         $('#alert').removeClass('show');
    // }, 3500);

    // })

    // window.addEventListener('open-edit-employee-modal', event => {
    //   $('#edit-employee-modal').modal('show');
    //   $('#alert').text(event.detail.message);
    //   $('#alert').addClass('show');
    //     setTimeout(function(){
    //         $('#alert').removeClass('show');
    // }, 3500);

    // })

    window.addEventListener('open-edit-specialty-modal', event => {
      $('#edit-specialty-modal').modal('show');
    })

    window.addEventListener('close-edit-specialty-modal', event => {
      $('#edit-specialty-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('open-delete-specialty-modal', event => {
      $('#delete-specialty-modal').modal('show');
    })

    window.addEventListener('close-delete-specialty-modal', event => {
      $('#delete-specialty-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('close-create-specialty-modal', event => {
      $('#new-specialty-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('close-new-degree-modal', event => {
      $('#new-degree-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('open-edit-degree-modal', event => {
      $('#edit-degree-modal').modal('show');
    })

    window.addEventListener('close-edit-degree-modal', event => {
      $('#edit-degree-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('open-delete-degree-modal', event => {
      $('#delete-degree-modal').modal('show');
    })

    window.addEventListener('close-delete-degree-modal', event => {
      $('#delete-degree-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('close-new-profession-modal', event => {
      $('#new-profession-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('open-edit-profession-modal', event => {
      $('#edit-profession-modal').modal('show');
    })

    window.addEventListener('close-edit-profession-modal', event => {
      $('#edit-profession-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

    window.addEventListener('open-delete-profession-modal', event => {
      $('#delete-profession-modal').modal('show');
    })

    window.addEventListener('close-delete-profession-modal', event => {
      $('#delete-profession-modal').modal('hide');
      $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);
    })

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

window.addEventListener('init-editor', event => {
  var editor = event.detail.editor;
  tinymce.init({
      selector: editor,
      height: '400px',
    });
})


window.addEventListener('open-delete-modal', event => {
  var modalId = event.detail.message;
  $("#" + modalId).modal('show');

})

window.addEventListener('close-delete-modal', event => {
  $('.modal').modal('hide');
  $('#alert').text(event.detail.message);
      $('#alert').addClass('show');
        setTimeout(function(){
            $('#alert').removeClass('show');
    }, 3500);

})

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