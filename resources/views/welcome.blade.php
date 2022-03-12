@extends('layouts.head')
@section('content')
<section style="background-image:linear-gradient(to right bottom, rgba(36, 34, 34, 0.233),rgba(49, 48, 48, 0.212)), url({{asset('images/hero.jpg')}})" class="hero flex">
    <div class="hero_sub">
        <h1>
            Cake to go
        </h1>
        <h2>
            You order, we deliver<br>
            We have cakes for all occasions
        </h2>
        <x-button-flat :id="'discover'" :class="'mt-3'" :type="'button'">Discover</x-button-flat>
    </div>
</section>
<x-base-section :id="'best-selling'">
    <h2 class="text-center w-full text-2xl text-yellow-400 mb-8 font-bold">Best Selling</h2>
    <div class="cakes_container">
        @foreach ($cakes as $item)
        <x-cake-component :item="$item"/>     
        @endforeach
    </div>
</x-base-section>
<x-base-section :id="'occasions'">
    <h2 class="text-center w-full text-2xl text-yellow-400 mb-8 font-bold">Cakes by occasions</h2>
    <div class="cakes_container">
        <x-occasion-cart :title="'Birthday'" :img="'birthday.jpg'"></x-occasion-cart>
        <x-occasion-cart :title="'Party'" :img="'party.jpg'"></x-occasion-cart>
        <x-occasion-cart :title="'Wedding'" :img="'wedding.jpg'"></x-occasion-cart>
        <x-occasion-cart :title="'Anniversary'" :img="'anniversary.jpg'"></x-occasion-cart>
    </div>
</x-base-section>
@endsection