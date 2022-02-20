@extends('layouts.head')

@section('content')
<x-base-section>

  <div class="w-full max-w-xs">
    <form action="{{route('update.data')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
       @csrf
  <h1 class="mb-4 font-bold text-pink-500">My Data</h1>
  @if (session('status'))
  <div class="text-black">{{session('status')}}</div>
  @endif
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Name
      </label>
      <input class="@error('name')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="{{Auth::user()->name}}">
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
      @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="{{Auth::user()->email}}">
      @error('email')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div> 
    <div class="flex items-center justify-between">
      <button class="bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Update
      </button>
      
    </div>
   
  </form>
</div> 
</x-base-section>
@endsection