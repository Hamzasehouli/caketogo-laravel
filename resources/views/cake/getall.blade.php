@extends('layouts.head')
@section('content')
    @foreach ($cakes as $item)
        <p>{{$item}}</p>
        @endforeach
        {{$cakes->links()}}
@endsection