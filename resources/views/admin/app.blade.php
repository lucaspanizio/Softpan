<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SoftPan</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- <nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-between">
            <div class="container-fluid">                

                <div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
                </div>
                
                <a href="{{ url('/') }}" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25">SoftPan</a>
                
                <div class="navbar-collapse collapse dual-nav w-50 order-2">
                    
                </div>
            </div>
        </nav> -->

        <div class="row" style="margin-top: 10% ">            
            <div class="col align-self-center">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>