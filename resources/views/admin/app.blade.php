<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="{{ asset('/css/admin.css') }}" media="all" rel="stylesheet" type="text/css" />
            <!-- Bootstrap 4 -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/l5827vw7aogh95lwv1hv7zqkh893yghbzw0578fqqlziuicp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/l5827vw7aogh95lwv1hv7zqkh893yghbzw0578fqqlziuicp/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
        @livewireStyles
    </head>
    <body>
      <div class="main-content-wrapper">
        <x-admin-nav/>
        <div class="main-container">
          <main >
              <div id="alert" class="alert btn-warning alert-dismissible fade" role="alert">
                Zaktualizowano profil!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
              @yield('content')
          </main>
        </div>
    <footer>
      <!-- <p>Panel Admin</p> -->
    </footer>
      </div>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){

  initEditor();

  function initEditor(){
    var el = $('textarea.editor').attr('id');
      tinymce.init({
      language: 'pl',
      selector: '#' + el,
      height: '400px',
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
  }

$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .mce-window, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});

var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
$.fn.bootstrapBtn = bootstrapButton // give $().bootstrapBtn the Bootstrap functionality

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


///////////////////////////////////////////////////////////////////////////////////////////////////
// BADANIA KLINICZNE

$('#clinical-trial-modal').on('show.bs.modal', function(event){
  tinymce.init({
      selector:'#textarea-new-clinical-trial',
      height: '400px',
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
  tinymce.init({
      selector:'#textarea-post',
      height: '400px',
      menubar: false,
      plugins: 'autolink link lists paste',
      // toolbar: 'styleselect | fontsizeselect',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
      // link_class_list: [
      //   {title: 'None', value: ''},
      //   {title: 'External Link', value: 'ext_link'},
      //   {title: 'Internal Support Link', value: 'int_sup_link'},
      //   {title: 'Internal Marketing Link', value: 'int_mark_link'},
      //   {title: 'Other Internal Link', value: 'int_other_link'}
      // ],
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
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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
      height: '400px',
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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

$('#contact-content-modal').on('show.bs.modal', function(event){
  tinymce.init({
      language: 'pl',
      selector:'#textarea_contact',
      height: '500px',
      menubar: false,
      plugins: 'autolink link lists paste',
      toolbar: ' undo redo | h2 h3 h4 h5 h6 | bold italic underline | link | numlist bullist | forecolor alignleft aligncenter alignright |',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
      paste_as_text: true,
      contextmenu: false,
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

$('#contact-form').on('submit', function(event){
  var content = tinyMCE.activeEditor.getContent();
  $(this).find('#textarea_contact').val(content);
  Livewire.emit('save', content);
  event.preventDefault();
})

// $('#file-modal input[type="file"]').change(function(e) {
  $('#file').change(function(e) {
      var name = e.target.files[0].name;
      var extension = name.replace(/^.*\./, '');
      Livewire.emit('change', name, extension);
  });


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

@livewireScripts
</body>
</html>