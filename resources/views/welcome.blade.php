<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
        <title>mizo</title>
    </head>
    <body>
        <div id="app">
            <app-component></app-component>
        </div>
        <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
        <script src="{{ asset('assets/vendors/js/jquery/jquery.min.js') }}"></script>   
        <!-- vue js -->
        @vite(['resources/js/app.js'])

    </body>
</html>
