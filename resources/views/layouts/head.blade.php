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
    <nav class="flex top-0 left-0 w-full shadow-lg fixed bg-pink-500 text-white px-14 py-4 justify-between">
      <ul class="flex justify-between">
          <li class="pr-3 last:pr-0">
              <a href="{{route('home')}}">Home</a>
          </li>
          <li class="pr-3 last:pr-0">
              <a href="{{route('cakes')}}">Cakes</a>
          </li>
      </ul>
      <ul class="flex justify-between">
          @if (Auth::check())
          <li class="pr-3 last:pr-0">
              <p>Hello {{Auth::user()->name}}</p>
          </li>
          <li class="pr-3 last:pr-0">
              <a href="{{route('profile')}}">Profile</a>
          </li>
          <li class="pr-3 last:pr-0">
              <a href="#">Cart</a>
          </li>
          <li class="pr-3 last:pr-0">
              <form method="post" action="{{route('logout')}}">
                @csrf
                @method('DELETE')
                <button type="submit" href="">Logout</button>    
              </form>
          </li>
              
          @else
              
          <li class="pr-3 last:pr-0">
              <a href="{{route('register')}}">Register</a>   
          </li>
          <li class="pr-3 last:pr-0">
              <a href="{{route('login')}}">Login</a>  
          </li>
          @endif
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