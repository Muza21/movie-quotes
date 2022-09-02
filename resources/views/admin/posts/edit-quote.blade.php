@php
use App\Models\Category;
@endphp
<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('update.quote', $quote->id) }}" enctype="multipart/form-data"
                class="mt-10">
                @csrf
                @method('PATCH')

                <header class="text-center font-bold text-xl pb-6 mb-6 border-b-2 border-gray-300">
                    <h2>Update Quote</h2>
                </header>

                <div class="flex justify-between mb-5">
                    <label for="title_id">Movie Title</label>
                    <select name="title_id" id="title_id" class="py-2 pl-4 pr-28 mb-2" required>
                        @foreach (Category::all() as $category)
                            <option value="{{ old('category_id', $category->id) }}"
                                {{ old('category_id', $quote->category_id) == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->title) }}</option>
                        @endforeach
                    </select>
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="quote">Quote</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quote"
                        id="quote" value="{{ old('quote', $quote->quote) }}" required>

                    @error('quote')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug">Slug</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="slug"
                        id="slug" value="{{ old('slug', $quote->slug) }}" required>

                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="thumbnail">Thumbnail</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="file" name="thumbnail"
                        id="thumbnail" value="{{ old('thumbnail', $quote->thumbnail) }}">

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-6 rounded-xl hover:bg-green-600">
                    Update
                </button>

            </form>

        </main>
    </section>
</x-navigation>
