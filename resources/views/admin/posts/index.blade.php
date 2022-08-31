@php
use App\Models\Category;
@endphp
<x-navigation>
    <div class="w-full max-w-4xl mx-auto my-20 bg-white shadow-lg rounded-xl border border-gray-200">
        <header class="px-9 py-4 border-b border-gray-100">
            <select name="category" id="category">
                @foreach (Category::all() as $category)
                    <option value="{{ $category->genre }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->genre) }}</option>
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
                                    <a href="/posts" class="hover:text-green-500">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="text-left text-green-500">
                                    <a href="/admin/posts/edit" class="hover:text-green-600">Add Quote</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="text-left font-medium text-orange-400">
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
