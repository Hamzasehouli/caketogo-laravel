@extends('layouts.head')

@section('content')
<x-base-section :id="'update'">
  <x-form-component>

    
    <div class="w-full max-w-xs">
    <form action="{{route('update-password')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
       @csrf
  @if (session('status'))
  <div class="text-black">{{session('status')}}</div>
  @endif
    <div class="mb-6">
      <label class="block  text-sm font-bold mb-2" for="oldpassword">
        Current Password
      </label>
      <input name="oldpassword" class="shadow appearance-none border @error('oldpassword')
      border-red-500
      @enderror  rounded w-full py-2 px-3  mb-3 leading-tight focus:outline-none focus:shadow-outline" id="oldpassword" type="password" placeholder="********">
      @error('oldpassword')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block  text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input name="password" class="shadow appearance-none border @error('password')
      border-red-500
      @enderror  rounded w-full py-2 px-3  mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********">
      @error('password')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block  text-sm font-bold mb-2" for="password">
        Password Confirmation
      </label>
      <input name="password_confirmation" class="shadow appearance-none border @error('password_confirmation')
      border-red-500
      @enderror  rounded w-full py-2 px-3  mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" placeholder="********">
      @error('password_confirmation')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
      @enderror
    </div>
    
    <div class="flex items-center justify-between">
      <button class="bg-yellow-400 hover:bg-black hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Update
      </button>
    </div>
    
  </form>
</div> 
</x-form-component>
</x-base-section>
@endsection