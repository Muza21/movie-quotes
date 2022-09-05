<x-navigation>
    <section>
        @if (($quote->movie_id ?? false) && ($quote->quote ?? false))
            <div class="max-w-xl  mx-auto rounded-xl mt-24 overflow-hidden">
                <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="max-w-full max-h-full" alt="">
            </div>
            <div class="max-w-2xl mx-auto rounded-xl text-center mt-8">
                <q class="text-white text-4xl">{{ $quote->quote }}</q>
            </div>
            <div class="max-w-2xl mx-auto rounded-xl mt-10">
                <h1 class="text-center text-white underline text-4xl">
                    <a href="{{ route('movie.quotes', $quote->movie->id) }}">{{ $quote->movie->title }}</a>
                </h1>
            </div>
        @else
            <div class="max-w-3xl p-10 bg-white mx-auto rounded-xl mt-32 text-center font-bold text-2xl">
                <h2>{{ __('texts.no_quotes') }}</h2>
            </div>
        @endif

    </section>
</x-navigation>
