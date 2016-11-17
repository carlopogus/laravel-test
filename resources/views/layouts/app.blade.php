<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="/libs/css/bootstrap.min.css" rel="stylesheet">

    @yield('styles')

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">

    @include('layouts.menu')

    @include('layouts.messages')

    @yield('content')

    <!-- JavaScripts -->
    <script src="/libs/js/jquery.min.js"></script>
    <script src="/libs/js/bootstrap.min.js"></script>
    @yield('scripts')
    <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
