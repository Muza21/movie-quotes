@props(['posts'])

<div class="lg:grid lg:grid-cols-1">
    @foreach ($posts as $post)
        {{-- in order to find more information we use: @dd($loop) --}}
        {{-- @dd($loop) --}}
        <x-post-card :post="$posts[$loop->iteration-1]" />
    @endforeach
</div>