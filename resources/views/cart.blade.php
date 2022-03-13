@extends('layouts.head')
@section('content')
<x-base-section :id="'cart-section'">
    <div class="w-full cart ">
        <script>
            const html = JSON.parse(localStorage.getItem('cakes'))?.map((c)=>{
                return `<div class="mb-4 justify-between p-4 w-1/2 h-40 flex rounded-xl overflow-hidden shadow-lg ">
            <img class="block w-40 mr-4 object-cover h-full" src="${'./public_path/' + c.photo}">
            <div class="mr-auto">

                
                <p class="mr-auto text-xl font-bold">
                   ${c.title}
                </p>
                <p class="font-bold text-yellow-400">    
                MAD ${c.price}
            </p>
            <p>Quantity: <button  class="text-xl text-green-200 ">+</button> <span class="font-bold text-yellow-400">${c.quantity}</span> <button class="text-xl text-red-200">-</button></p>
        </div>
            <div class="flex flex-col">
                <x-button-flat :class="'mb-2'" :id="'order-btn'" :type="'button'">
                    Order
                </x-button-flat>
                <x-button-flat :class="''" :id="'order-btn'" :type="'button'">
                    Delete
                </x-button-flat>
            </div>
            </div>`
            }).join('')
            document.querySelector(".cart").insertAdjacentHTML("afterbegin", html);
            </script>
            </div>
</x-base-section>
@endsection