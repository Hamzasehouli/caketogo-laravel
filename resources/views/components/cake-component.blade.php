@props(['item'])

<div class="cake_cart ">
        <a href="{{route('show.cake',['cake'=>$item->id])}}">
        <figure class="cake_fig">
            <img class="cake_img" src="{{asset('public_path/' . $item->photo)}}">
        </figure>
        <div class="p-2">
            <p class="cake_title">{{$item->title}}</p>
            <p class="cake_price"><span class="font-bold">MAD</span> {{$item->price}}</p>
        </a>
    </div>
</div>