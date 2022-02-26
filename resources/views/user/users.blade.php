@extends('layouts.head')
@section('content')
    @foreach ($users as $item)
        <p>{{$item}}</p>
        @endforeach
        {{$users->links()}}
@endsection