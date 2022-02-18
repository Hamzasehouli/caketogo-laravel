@extends('layouts.head')

@section('content')
<x-base-section >
  <form action="{{route('admin.login')}}" method="post">
    @csrf
  <h1>Login</h1>
  @if (session('status'))
  <div class="text-black">{{session('status')}}</div>
  @endif
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
    <input id="password" name="password" type="text" value="{{old('password')}}">
    @error('password')
        {{$message}}
    @enderror
  </div>
  <button type="submit">Log in</button>
</form>
</x-base-section >  
@endsection