@extends('layouts.head')

@section('content')
<x-base-section>
<x-form-component>

  <div class="w-full max-w-xs">
    <form action="{{route('forget-password')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
       @csrf
  @if (session('status'))
  <div class="text-inherit">{{session('status')}}</div>
  @endif
    <div class="mb-4">
      <input class="@error('email')
      border-red-500
      @enderror shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="Email">
      @error('email')
      <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div> 
    <div class="flex items-center justify-between">
      <button class="bg-yellow-400 hover:bg-black text-gray-600 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Submit
      </button>
      
    </div>
    
  </form>
</div> 
</x-form-component>
</x-base-section>
@endsection