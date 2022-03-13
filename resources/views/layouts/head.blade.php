<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script defer src="/js/app.js"></script>
    <title>Caketogo | {{$title}}</title>
</head>
<body class="text-gray-600">

    <x-header></x-header>

    <main class="min-h-[100vh] mx-auto max-w-[1420px]">
        @yield('content')
    </main>

    <x-footer></x-footer> 
    
</body>
</html>