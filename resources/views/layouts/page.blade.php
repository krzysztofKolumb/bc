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

    <header class="header-basic header-page">
        <div class="header-content">
            <h1>@yield('title')</h1>
            <p>@yield('subtitle')</p>
        </div>
    </header>

    @yield('main')
    
    <x-online-registration/>
    <x-footer/>

    <script src="{{ asset('/js/jquery-3.6.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-5.0.0-beta3-dist.min.js') }}" ></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    </div>
</body>
 </html>