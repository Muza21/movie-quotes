<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="/admin/posts/create" class="mt-10">
                @csrf
        
                <div class="mb-5">
                    <label for="title">Movie Title</label>
                
                    <input
                        class="border border-gray-400 p-2 w-full rounded-xl"
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old("email") }}"
                        required
                    >
                
                    @error("title")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="slug">Slug</label>
                
                    <input
                        class="border border-gray-400 p-2 w-full rounded-xl"
                        type="text"
                        name="slug"
                        id="slug"
                        required
                    >
                
                    @error("slug")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <select name="category" id="category" class="py-2 mb-2">
                    {{-- Here are options that are from database --}}
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('genre_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->genre) }}</option>
                    @endforeach
                </select>
                <div class="mb-6">
                    <label for="quote">Quote</label>
                
                    <input
                        class="border border-gray-400 p-2 w-full rounded-xl"
                        type="text"
                        name="quote"
                        id="quote"
                        required
                    >
                
                    @error("quote")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thumbnail">Thumbnail</label>
                
                    <input
                        class="border border-gray-400 p-2 w-full rounded-xl"
                        type="file"
                        name="thumbnail"
                        id="thumbnail"
                        required
                    >
                
                    @error("thumbnail")
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