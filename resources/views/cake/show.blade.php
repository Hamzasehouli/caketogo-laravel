@extends('layouts.head')
@section('content')
<x-base-section :id="'show-cake'">
    <div class="w-11/12 m-auto">
        {{-- <p>{{$cake}}</p> --}}
        <div class="flex justify-center">
          
                <img class="object-cover block mr-14 w-96 h-96" src="{{asset('./public_path/' . $cake->photo)}}">
            
            <div>
                <h1 class="mb-4 text-2xl font-bold ">{{$cake->title}}</h1>
                <p class="text-l font-bold mb-2">Weight: {{$cake->weight}} kg</p>
                <p class="mb-7 text-2xl font-bold text-yellow-400">MAD {{$cake->price}}</p>
                <div>
                    
                    <h2 class=" text-l font-bold mb-2">Desciption</h2>
                    <p class="text-sm w-2/3">{{$cake->description}}</p>
                    
                </div>
                <div>
                    <h2 class=" text-l font-bold mt-4 mb-2">Quantity</h2>
                <div class="custom-number-input h-10 w-32">
                    {{-- <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Counter Input
                    </label> --}}
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class=" bg-yellow-400 text-gray-600 hover:text-white hover:bg-black h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input type="number" class="outline-none focus:outline-none text-center w-full bg-yellow-400 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="1"></input>
                    <button data-action="increment" class="bg-yellow-400 text-gray-600 hover:text-white hover:bg-black h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
  
 
  
 
                    <x-button-flat :data="$cake" :cakecategory="$cake->category" :cakedescription="$cake->description" :cakeprice="$cake->price" :cakeid="$cake->id" :caketitle="$cake->title" :cakephoto="$cake->photo" :cakeweight="$cake->weight" :type="'button'" :id="'add-to-cart'" :class="'mt-8'" >Add to cart</x-button-flat>
                </div>
            </div>
        </div>
    </div>
</x-base-section>
@endsection