@extends('layouts.head')

@section('content')
<x-base-section :id="'login'">
  <x-form-component>

    
    <div class="w-full max-w-xs">
      <form action="{{route('login')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
       @csrf
    <h1 class="mb-4 font-bold text-yellow-400 text-2xl">Login</h1>
  @if (session('status'))
  <div class="text-black">{{session('status')}}</div>
  @endif
    <div class="mb-4">
      <label class="text-gray-600 block text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input class="@error('email')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="Email">
      @error('email')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-gray-600 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input name="password" class="shadow appearance-none border @error('password')
      border-red-500
      @enderror  rounded w-full py-2 px-3  mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********">
      @error('password')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    
    <div class="flex items-center justify-start">
      <button class=" mr-3 bg-yellow-400 hover:bg-yellow-500 text-gray-600 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Log In
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800" href="{{route('register')}}">
        Sign Up
      </a>
    </div>
    <a class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800 mt-4" href="{{route('forget-password')}}">
      Forgot Password?
    </a>
  </form>
</div> 
</x-form-component>
</x-base-section>
@endsection