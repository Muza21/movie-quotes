@php
use App\Models\Category;
@endphp
<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('post.movie') }}" enctype="multipart/form-data" class="mt-10">
                @csrf
                <header class="text-center font-bold text-xl pb-6 mb-6 border-b-2 border-gray-300">
                    <h2>Update Movies</h2>
                </header>

                <div class="mb-6">
                    <label for="title">Movie Title</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title"
                        id="title" value="{{ old('title', $post->category->title) }}" required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug">Slug</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="slug"
                        id="slug" value="{{ old('slug', $post->category->slug) }}" required>

                    @error('slug')
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
