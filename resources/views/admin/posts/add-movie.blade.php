<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('post.movie') }}" enctype="multipart/form-data" class="mt-10">
                @csrf

                <header class="text-center font-bold text-xl pb-6 mb-6 border-b-2 border-gray-300">
                    <h2>Add Movies</h2>
                </header>
                <div class="mb-6">
                    <label for="title_en">Movie Title en</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title_en"
                        id="title_en" required>

                    @error('title_en')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="title_ka">Movie Title ka</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title_ka"
                        id="title_ka" required>

                    @error('title_ka')
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
