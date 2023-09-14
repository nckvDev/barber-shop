@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex w-full items-center px-4 py-3 rounded-lg bg-indigo-100 text-md font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex w-full items-center px-4 py-3 rounded-lg text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:bg-indigo-50 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
