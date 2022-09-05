@props(['quotes'])

<div class="lg:grid lg:grid-cols-1">
    @foreach ($quotes as $quote)
        <x-post-card :quote="$quotes[$loop->iteration - 1]" />
    @endforeach
</div>
