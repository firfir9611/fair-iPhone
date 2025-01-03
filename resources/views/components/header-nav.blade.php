@props(['active'=> false])

<a
{{ $attributes }}
class="
{{ $active ? 'bg-gray-100' : '' }}
 hover:bg-gray-100 text-gray-900
text-sm font-semibold leading-6 py-2 px-4 min-w-24 text-center rounded-md">{{ $slot }}</a>
