@props(['posts'])

<div class="lg:grid lg:grid-cols-1">
    @foreach ($posts as $post)
        <x-post-card :post="$posts[$loop->iteration - 1]" />
    @endforeach
</div>
