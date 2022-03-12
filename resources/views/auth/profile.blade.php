@extends('layouts.head')

@section('content')
<x-base-section :id="'profile'">
  <x-form-component>

  

  <div class="w-full max-w-xs">
    <form action="{{route('update.data')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
       @csrf
  <h1 class="mb-4 font-bold text-yellow-400 text-2xl">My Data</h1>
  @if (session('status'))
  <div class="text-black">{{session('status')}}</div>
  @endif
    <div class="mb-4">
      <label class="block  text-sm font-bold mb-2" for="email">
        Name
      </label>
      <input class="@error('name')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}">
      @error('name')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block  text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input class="@error('email')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" value="{{Auth::user()->email}}" placeholder="{{Auth::user()->email}}">
      @error('email')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div> 
    <div class="flex items-center justify-start">
      <button class="bg-yellow-400 hover:bg-black mr-3 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Update
      </button>
      <a class="inline-block align-baseline font-bold text-sm  hover:text-gray-800" href="{{route('update-password')}}">
        Update Password
      </a>
      
    </div>
   
  </form>
</div> 
</x-form-component>
</x-base-section>
@endsection