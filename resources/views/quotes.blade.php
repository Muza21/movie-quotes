<x-navigation>
    <section>
        <div class="max-w-2xl mx-auto m-16">
            <h1 class="text-left text-white underline text-4xl">
                {{ $movie->title }}
            </h1>
        </div>
        @if ($quotes->count())
            <x-posts-grid :quotes="$quotes" />
        @else
            <div class="max-w-2xl mx-auto m-28">
                <h1 class="text-center text-white text-4xl font-bold">
                    {{ __('texts.no_quotes') }}
                </h1>
            </div>
        @endif
    </section>
</x-navigation>
