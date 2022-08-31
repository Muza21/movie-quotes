<x-navigation>
        <div class="w-full max-w-4xl mx-auto my-20 bg-white shadow-lg rounded-xl border border-gray-200">
            <header class="px-9 py-4 border-b border-gray-100">
                <select name="category" id="category">
                    {{-- Here are options that are from database --}}
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->genre }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->genre) }}</option>
                    @endforeach
                </select>
            </header>
            <div class="overflow-x-auto p-3">
                <table class="table-auto w-full">
                    <tbody class="text-sm divide-y divide-gray-100">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <div class="font-medium text-gray-800 underline">
                                        {{-- this will take user to the Movie's quotes --}}
                                        <a href="/posts" class="hover:text-green-500"> 
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="text-left text-green-500">
                                        {{-- This will take user to create new quote of this current movie --}}
                                        <a href="/admin/posts/edit" class="hover:text-green-600">Add Quote</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="text-left font-medium text-orange-400">
                                        {{-- This will take user to remove or add new quotes or edit current quotes page --}}
                                        <a href="/admin/posts/edit" class="hover:text-orange-600">Edit</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-center">
                                        <form method="POST" action="/admin/posts">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-sm text-red-400 hover:text-red-600">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-navigation>