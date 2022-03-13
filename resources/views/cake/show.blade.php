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
                    <x-button-flat :data="$cake" :cakecategory="$cake->category" :cakedescription="$cake->description" :cakeprice="$cake->price" :cakeid="$cake->id" :caketitle="$cake->title" :cakephoto="$cake->photo" :cakeweight="$cake->weight" :type="'button'" :id="'add-to-cart'" :class="'mt-8'" >Add to cart</x-button-flat>
                </div>
            </div>
        </div>
    </div>
</x-base-section>
@endsection