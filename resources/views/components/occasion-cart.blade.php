@props(['title','img'])

<div class="cake_cart ">
        <a href="{{route('cakes',['category'=>strtolower($title)])}}">
        <figure class="cake_fig">
            <img class="cake_img" src="{{asset('images/' . $img)}}">
        </figure>
        <div class="p-2">
            {{-- <p class="cake_title">Birthday</p> --}}
            <p class="cake_title text-center mb-2">{{$title}}</p>
            {{-- <p class="cake_price"><span class="font-bold">MAD</span> {{$item->price}}</p> --}}
        </a>
    </div>
</div>