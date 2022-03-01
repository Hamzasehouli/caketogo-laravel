@extends('layouts.head')
@section('content')
<x-base-section>
    <div class="cakes_container">
        @foreach ($cakes as $item)
        <x-cake-component :item="$item"></x-cake-component>
        @endforeach
    </div>
</x-base-section>
<div class="page_links">
{{$cakes->links()}}
</div>
    @endsection