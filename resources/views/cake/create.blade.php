@extends('layouts.head')

@section('content')
<x-base-section>

  <div class="w-full max-w-xs">
    <form enctype="multipart/form-data" action="{{route('cakes')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
       @csrf
  <h1 class="mb-4 font-bold text-pink-500">Add Cake</h1>
  @if (session('status'))
  <div class="text-black">{{session('status')}}</div>
  @endif
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Title
      </label>
      <input value="{{old('title')}}" class="@error('title')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="title">
      @error('title')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
        Price
      </label>
      <input value="{{old('price')}}"  class="@error('price')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="price" id="price" type="number" placeholder="price">
      @error('price')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="weight">
        Weight
      </label>
      <input value="{{old('weight')}}"  class="@error('weight')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="weight" id="weight" type="number" placeholder="weight">
      @error('price')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
        Description
      </label>
      <textarea value="{{old('description')}}"  class="@error('description')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" placeholder="description"></textarea>
      @error('description')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">
          Photo
        </label>
        <input class="@error('photo')
        border-red-500
        @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="photo" id="photo" type="file" >
        @error('photo')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
      </div>
    
    <div class="flex items-center justify-between">
      <button class="bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Add
      </button>
    </div>
   
  </form>
</div> 
</x-base-section>
@endsection