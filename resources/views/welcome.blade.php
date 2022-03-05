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
        <x-button-flat :class="'mt-3'" :type="'button'">Discover</x-button-flat>
    </div>
</section>
<x-base-section >
    <div>
        @foreach ($cakes as $item)
        <x-cake-component :item="$item">
            
        </x-cake-component>
            
        @endforeach
    </div>
</x-base-section>
@endsection