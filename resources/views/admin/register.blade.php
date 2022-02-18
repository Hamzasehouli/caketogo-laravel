@extends('layouts.head')

@section('content')
  <x-base-section >
    <form action="{{route('admin.register')}}" method="post">
      @csrf
    <h1>Register</h1>
    <p>{{session('status')}}</p>
    
    <div>
      <label for="email">
        email
      </label>
      <input id="email" name="email" type="email" value="{{old('email')}}">
      @error('email')
          {{$message}}
      @enderror
    </div>
    <div>
      <label for="password">
        Password
      </label>
      <input id="password" name="password" type="password" value="{{old('password')}}">
      @error('password')
          {{$message}}
      @enderror
    </div>
    <div>
      <label for="password_confirmation">
        Confirm Password
      </label>
      <input id="password_confirmation" name="password_confirmation" type="password" value="{{old('password_confirmation')}}">
      @error('password_confirmation')
          {{$message}}
      @enderror
    </div>
    <button type="submit">Register</button>
  </form>
  </x-base-section >
@endsection