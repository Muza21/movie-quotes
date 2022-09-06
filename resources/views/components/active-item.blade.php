@props(['active' => false])

@php
$classes = 'p-3 border-2 border-white bg-white text-center rounded-full';
if ($active) {
    $classes .= ' bg-neutral-700 text-white';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
