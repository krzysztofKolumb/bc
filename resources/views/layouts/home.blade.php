<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('meta_title')</title>
        <meta name="description" content="@yield('description')">
        <x-css-links/>
    </head>
    
    <body class="@yield('name')">
    <div class="page-main-wrapper">
        <x-page-nav/>

    <header class="home-header">
        <h1><span>Wielospecjalistyczna </span> 
            <span>Przychodnia Lekarska </span>
            <span>z Pracownią Endoskopii</span>
            <span>w Warszawie</span>
         </h1>
    </header>
        
    @yield('main')
    
    <x-online-registration/>

    <x-footer/>       

    <script src="{{ asset('/js/jquery-3.6.min.js') }}"></script>
    <script>
        $(".menu-btn").on('click', function(){
            $('.menu-container').toggleClass('active');
        });    

        $(".dropbtn").on('click', function(){
            $(this).next().toggleClass('active');
        });
    </script>
    </div>
</body>
 </html>