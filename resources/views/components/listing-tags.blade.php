@props(['tagsCSV'])

{{-- ------- split comma separated values ---------------- --}}
@php
    $tags = explode(',', $tagsCSV)
@endphp

<div>
    <ul class="flex">
        @foreach ($tags as $tag)
            <li>
                <a href="?tag={{$tag}}" class="bg-gray-600 mr-2 text-white py-1 px-2 rounded-full hover:bg-black">{{$tag}}</a>
            </li>
        @endforeach
    </ul>
</div>