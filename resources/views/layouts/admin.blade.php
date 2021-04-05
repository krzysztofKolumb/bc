<html>
<head>
        <title>App @yield('title')</title>
        @livewireStyles

    </head>
    <body>
        <h1>@yield('title')</h1>
        <livewire:uploads />
        <div class="container">
            @yield('content')
        </div>

        @livewireScripts
        <script>
            window.livewire.on('fileUploaded', ()=>{
                $('#form-upload')[0].reset();
            });
        </script>    
    </body>
 </html>