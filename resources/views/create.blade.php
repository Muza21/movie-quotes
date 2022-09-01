@php
use App\Models\Category;
use App\Models\Movie;
@endphp
<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('admin.post') }}" enctype="multipart/form-data" class="mt-10">
                @csrf

                <div class="flex justify-between mb-5">
                    <label for="title_id">Movie Title</label>
                    <select name="title_id" id="title_id" class="py-2 px-20 mb-2">
                        @foreach (Movie::all() as $movie)
                            <option value="{{ $movie->id }}"
                                {{ old('category_id') == $movie->id ? 'selected' : '' }}>
                                {{ ucwords($movie->title) }}</option>
                        @endforeach
                    </select>
                    {{-- <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title"
                        id="title" value="{{ old('email') }}" required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="mb-6">
                    <label for="slug">Slug</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="slug"
                        id="slug" required>

                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between mb-5">
                    <label for="title_id">Genre</label>
                    <select name="category_id" id="category_id" class="py-2 px-20 mb-2">
                        @foreach (Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->genre) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="quote">Quote</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quote"
                        id="quote" required>

                    @error('quote')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thumbnail">Thumbnail</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="file" name="thumbnail"
                        id="thumbnail" required>

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-6 rounded-xl hover:bg-green-600">
                    Create
                </button>

            </form>

        </main>
    </section>
</x-navigation>
