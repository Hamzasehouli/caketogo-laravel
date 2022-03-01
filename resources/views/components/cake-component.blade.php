@props(['item'])

<div class="cake_cart ">
        <a href="#">
        <figure class="cake_fig">
            <img class="cake_img" src="https://i1.fnp.com/images/pr/m/v20190802125813/cream-drop-chocolate-cake.jpg">
        </figure>
        <p class="cake_title">{{$item->title}}</p>
        <p class="cake_price">{{$item->price}}</p>
        </a>
</div>