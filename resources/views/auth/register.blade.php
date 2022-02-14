@extends('layouts.head')

@section('content')
  <x-base-section >
    <form action="{{route('register')}}" method="post">
      @csrf
    <h1>Register</h1>
    <div>
      <label for="name">
        Name
      </label>
      <input id="name" name="name" type="text" value="{{old('name')}}">
      @error('name')
          {{$message}}
      @enderror
    </div>
    <div>
      <label for="email">
        email
      </label>
      <input id="email" email="email" type="text" value="{{old('email')}}">
      @error('email')
          {{$message}}
      @enderror
    </div>
    <div>
      <label for="password">
        Password
      </label>
      <input id="password" name="password" type="text" value="{{old('password')}}">
      @error('password')
          {{$message}}
      @enderror
    </div>
    <button type="submit">Sign up</button>
  </form>
  </x-base-section >
@endsection