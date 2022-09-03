@php
use App\Models\Movie;
@endphp
<x-navigation>
    <div class="w-full max-w-4xl mx-auto my-20 bg-white shadow-lg rounded-xl border border-gray-200">
        <header class="px-9 py-4 border-b border-gray-100">
            <h2 class="font-bold text-lg text-center">{{ __('texts.manage_quotes') }}</h2>
            <select name="category" id="category" class="px-9 py-2">
                @foreach (Movie::all() as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                        {{ ucwords($movie->title) }}</option>
                @endforeach
            </select>
        </header>
        <div class="overflow-x-auto p-3">
            <table class="table-auto w-full">
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <div class="font-medium text-gray-800 text-lg">
                                    <q>{{ $post->quote }}</q>

                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="text-left text-green-500">
                                    <a href="{{ route('movie.quotes', $post->movie->id) }}"
                                        class="hover:text-green-600">{{ __('texts.view') }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="text-left font-medium text-orange-400">
                                    <a href="{{ route('edit.quote', $post->id) }}"
                                        class="hover:text-orange-600">{{ __('texts.edit') }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-center">
                                    <form method="POST" action="{{ route('delete.quote', $post->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="text-sm text-red-400 hover:text-red-600">{{ __('texts.delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-flash />
</x-navigation>
