@props(['active' => false])

@php
$classes = 'p-2 w-10 text-center rounded-full';
if ($active) {
    $classes .= ' text-green-500';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
