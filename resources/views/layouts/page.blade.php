<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('meta_title')</title>
        <meta name="description" content="@yield('description')">
        <link href="{{ asset('/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
        <x-css-links/>
    </head>

    <body class=" @yield('name') ">
    <div class="page-main-wrapper">

    <x-page-nav/>

    <section>
        <header class="basic-s bcg">
            <div class="header-content">
                <h1>@yield('title')</h1>
                <p>@yield('subtitle')</p>
            </div>
        </header>
    </section>

    @yield('main')
    
    <x-online-registration/>
    <x-footer/>

    <script src="{{ asset('/js/jquery-3.6.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-5.0.0-beta3-dist.min.js') }}" ></script>
    <script src="{{ asset('/js/app.js') }}"></script>
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

    <!-- <script src="{{ asset('/js/google-analytics.js') }}"></script> -->
    </div>
</body>
 </html>