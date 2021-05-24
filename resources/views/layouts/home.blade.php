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

    </div>
    @livewireScripts
    <script src="{{ asset('/js/jquery-3.6.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.jdSlider-latest.js') }}"></script>

    <script>
        window.onload = function () {
            // $('.slider1').jdSlider();

            $('.slider2').jdSlider({
                wrap: '.slide-inner',
                isAuto: false,
                isLoop: true
            });

            // $('.slider3').jdSlider({
            //     wrap: '.slide-inner',
            //     slideShow: 2,
            //     slideToScroll: 2,
            //     isLoop: false,
            //     responsive: [{
            //         viewSize: 768,
            //         settings: {
            //             slideShow: 1,
            //             slideToScroll: 1
            //         }
            //     }]
            // });
            // $('.slider3-2').jdSlider({
            //     wrap: '.slide-inner',
            //     slideShow: 2,
            //     slideToScroll: 1,
            //     isLoop: true,
            //     responsive: [{
            //         viewSize: 768,
            //         settings: {
            //             slideShow: 1
            //         }
            //     }]
            // });

            $('.slider3-3').jdSlider({
                wrap: '.slide-inner',
                slideShow: 2,
                slideToScroll: 2,
                isLoop: true,
                responsive: [{
                    viewSize: 768,
                    settings: {
                        slideShow: 1,
                        slideToScroll: 1
                    }
                }]
            });
            // $('.slider4').jdSlider({
            //     wrap: '.slide-inner',
            //     isSliding: false,
            //     isAuto: true,
            //     isLoop: true,
            //     isDrag: false
            // });
        };
    </script>

    <script>
        $(".menu-btn").on('click', function(){
            $('.menu-container').toggleClass('active');
        });    
        $(".dropbtn").on('click', function(){
            $(this).next().toggleClass('active');
        });

        updateTeam();

        function updateTeam(){
            $(".team-list li").animate({opacity: 0.3});
            Livewire.emit('update');
            $(".team-list li").animate({opacity: 1});
            setTimeout(updateTeam, 10000);
        }
    </script>
</body>
 </html>