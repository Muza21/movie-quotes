<x-navigation>
    <section>
        <div class="max-w-2xl mx-auto m-16">
            <h1 class="text-left text-white underline text-4xl">
                {{ $movie->title }}
                {{-- <a href="{{ route('quotes.posts') }}">{{ __('texts.movie_title') }}</a> --}}
            </h1>
        </div>
        @if ($quotes->count())
            <x-posts-grid :posts="$quotes" />

            {{-- {{ $posts->links() }} Will be using this soon --}}
        @else
            <p class="text-center">No post yet. Please check back later.</p>
        @endif
    </section>
</x-navigation>
