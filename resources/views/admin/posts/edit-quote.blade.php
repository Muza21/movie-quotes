@php
use App\Models\Movie;
@endphp
<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('quotes.update', $quote->id) }}" enctype="multipart/form-data"
                class="mt-10">
                @csrf
                @method('PATCH')

                <header class="text-center font-bold text-xl pb-6 mb-6 border-b-2 border-gray-300">
                    <h2>{{ __('texts.update_quote') }}</h2>
                </header>

                <div class="flex justify-between mb-5">
                    <label for="movie_id">{{ __('texts.movie_title') }}</label>
                    <select name="movie_id" id="movie_id" class="py-2 pl-4 pr-28 mb-2" required>
                        @foreach (Movie::all() as $movie)
                            <option value="{{ old('movie_id', $movie->id) }}"
                                {{ old('category_id', $quote->movie_id) == $movie->id ? 'selected' : '' }}>
                                {{ ucwords($movie->title) }}</option>
                        @endforeach
                    </select>
                    @error('movie_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="quote_en">{{ __('texts.quote_en') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quote_en"
                        id="quote_en" value="{{ old('quote_en', $quote->getTranslation('quote', 'en')) }}" required>

                    @error('quote_en')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="quote_ka">{{ __('texts.quote_ka') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quote_ka"
                        id="quote_ka" value="{{ old('quote_ka', $quote->getTranslation('quote', 'ka')) }}" required>

                    @error('quote_ka')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="thumbnail">{{ __('texts.thumbnail') }}</label>

                    <div class="flex">
                        <input class="border border-gray-400 p-2 w-full rounded-xl" type="file" name="thumbnail"
                            id="thumbnail" value="{{ old('thumbnail', $quote->thumbnail) }}">
                        <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="w-28 rounded-lg" alt="">
                    </div>
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-6 rounded-xl hover:bg-green-600">
                    {{ __('texts.update') }}
                </button>

            </form>

        </main>
    </section>
</x-navigation>
