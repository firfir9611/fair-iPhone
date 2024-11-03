@props(['active'=> false])

<a
{{ $attributes }}
class="
{{ $active ? 'bg-gray-100' : '' }}
 hover:bg-gray-100 text-gray-900
text-sm font-semibold leading-6 p-2 rounded-md">{{ $slot }}</a>
