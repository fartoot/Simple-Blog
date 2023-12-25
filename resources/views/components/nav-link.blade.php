@props(['active'])

<a {{ $attributes }} class=" text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ ($active) ? "bg-gray-800": ""}}">
    {{ $slot }}
</a>