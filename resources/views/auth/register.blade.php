@extends('layouts.head')

@section('content')
  <x-base-section >
    <div class="w-full max-w-xs">
      <form action="{{route('register')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
         @csrf
    <h1 class="mb-4 font-bold text-pink-500">Sign Up</h1>
    @if (session('status'))
    <div class="text-black">{{session('status')}}</div>
    @endif
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
          Name
        </label>
        <input class="@error('name')
        border-red-500
        @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="Name">
        @error('name')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input class="@error('email')
        border-red-500
        @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="Email">
        @error('email')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input name="password" class="shadow appearance-none border @error('password')
        border-red-500
        @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
        @error('password')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
        Password Confirmation
      </label>
      <input name="password_confirmation" class="shadow appearance-none border @error('password_confirmation')
      border-red-500
      @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password_confirmation" placeholder="******************">
      @error('password_confirmation')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
      <div class="flex items-center justify-between">
        <button class="bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
         Sign Up
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('login')}}">
          Log In
        </a>
      </div>
    </form>
  </div> 
  </x-base-section >
@endsection