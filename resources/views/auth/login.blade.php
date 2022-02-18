@extends('layouts.head')

@section('content')
<form action="{{route('login')}}" method="post">
  @csrf
<h1>Log in</h1>
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
@endsection