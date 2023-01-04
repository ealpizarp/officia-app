@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp

<ul class="flex justify-center">
@foreach($tags as $tag)
    <li
        class="flex items-center bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded py-1 px-1 mr-2 text-xs">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
@endforeach
</ul>