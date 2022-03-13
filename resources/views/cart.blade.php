@extends('layouts.head')
@section('content')
<x-base-section :id="'cart-section'">
    <div class="w-full ">
        <div class="justify-between p-4 w-1/2 h-40 flex rounded-xl overflow-hidden shadow-lg ">
            <img class="block w-40 mr-4 object-cover h-full" src="https://www.thedesignwork.com/wp-content/uploads/2011/10/Random-Pictures-of-Conceptual-and-Creative-Ideas-02.jpg">
            <div class="mr-auto">

                
                <p class="mr-auto text-xl font-bold">
                    Choclate cake
                </p>
                <p class="font-bold text-yellow-400">    
                MAD 200
            </p>
            <p>Quantity: <button  class="text-xl text-green-200 ">+</button> <span class="font-bold text-yellow-400">2</span> <button class="text-xl text-red-200">-</button></p>
        </div>
            <div class="flex flex-col">
                <x-button-flat :class="'mb-2'" :id="'order-btn'" :type="'button'">
                    Order
                </x-button-flat>
                <x-button-flat :class="''" :id="'order-btn'" :type="'button'">
                    Delete
                </x-button-flat>
            </div>
        </div>
    </div>
</x-base-section>
@endsection