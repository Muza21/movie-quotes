@props(['active'  => false])

@php
    $classes = 'p-2 w-10 text-center rounded-full';
    if($active) $classes .= ' bg-neutral-700 text-white';
@endphp

<p {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</p>
