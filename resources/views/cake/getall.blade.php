@extends('layouts.head')
@section('content')
<x-base-section :id="'get-cakes'">
    <div class="cakes_container">
        @if($cakes->count() !==0)
            @foreach ($cakes as $item)
            <x-cake-component :item="$item"></x-cake-component>
            @endforeach
@else       

<p class="w-full font-bold text-center">No cakes found</p>
@endif
        

    
    </div>
</x-base-section>
<div class="page_links">
{{$cakes->links()}}
</div>
    @endsection