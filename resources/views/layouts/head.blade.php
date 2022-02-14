<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="flex bg-pink-500 text-white px-14 py-4 justify-between">
      <ul class="flex justify-between">
          <li class="pr-3 last:pr-0">
              <a href="{{route('home')}}">Home</a>
          </li>
          <li class="pr-3 last:pr-0">
              <a href="#">Cakes</a>
          </li>
      </ul>
      <ul class="flex justify-between">
          <li class="pr-3 last:pr-0">
              <a href="{{route('register')}}">Register</a>   
          </li>
          <li class="pr-3 last:pr-0">
              <a href="{{route('login')}}">Login</a>  
          </li>
          <li class="pr-3 last:pr-0">
              <a href="">Hamza Sehouli</a>
          </li>
          <li class="pr-3 last:pr-0">
              <a href="">Logout</a>    
          </li>
      </ul>
    </nav>
    <main class="min-h-[100vh] mx-auto max-w-[1420px]">
        @yield('content')
    </main>
    <footer class="bg-pink-500 w-full h-screen">
<p>footer</p>
    </footer>

</body>
</html>