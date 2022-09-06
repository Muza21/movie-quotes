@props(['active' => false])

@php
$classes = 'block text-left px-3 text-lg leading-6 hover:bg-green-500 focus:bg-green-500 hover:text-white focus:text-white';
if ($active) {
    $classes .= ' bg-green-500 text-white';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
