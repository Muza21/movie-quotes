@php
use App\Models\Movie;
@endphp
<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('post.quote') }}" enctype="multipart/form-data" class="mt-10">
                @csrf
                <header class="text-center font-bold text-xl pb-6 mb-6 border-b-2 border-gray-300">
                    <h2>{{ __('texts.add_quotes') }}</h2>
                </header>
                <div class="flex justify-between mb-5">
                    <label for="title_id">{{ __('texts.movie_title') }}</label>
                    <select name="title_id" id="title_id" class="py-2 pl-4 pr-28 mb-2" required>
                        @foreach (Movie::all() as $movie)
                            <option value="{{ $movie->id }}">
                                {{ ucwords($movie->title) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="quote_en">{{ __('texts.quote_en') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quote_en"
                        id="quote_en" required>

                    @error('quote_en')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="quote_ka">{{ __('texts.quote_ka') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quote_ka"
                        id="quote_ka" required>

                    @error('quote_ka')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="thumbnail">{{ __('texts.thumbnail') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="file" name="thumbnail"
                        id="thumbnail" required>

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-6 rounded-xl hover:bg-green-600">
                    {{ __('texts.create') }}
                </button>
            </form>
        </main>
    </section>
</x-navigation>
