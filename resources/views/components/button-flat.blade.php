@props(['type','class'])
<button class="{{$class}} bg-yellow-400 hover:bg-black text-gray-600 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="{{$type}}">
{{$slot}}
</button>