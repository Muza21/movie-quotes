@php
use App\Models\Movie;
@endphp
<x-navigation>
    <div class="w-full max-w-4xl mx-auto my-20 bg-white shadow-lg rounded-xl border border-gray-200">
        <header class="px-9 py-4 border-b border-gray-100">
            <h2 class="font-bold text-lg text-center">{{ __('texts.manage_quotes') }}</h2>
            {{-- <select name="category" id="category" class="px-9 py-2">
                @foreach (Movie::all() as $movie)
                    <a href="{{ route('movie.quotes', $movie->id) }}"></a>
                    <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                        {{ ucwords($movie->title) }}
                    </option>
                @endforeach
            </select> --}}
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="text-sm font-bold uppercase bg-gray-100 rounded-xl p-4 hover:text-green-500">
                        {{ isset($currentMovie) ? $currentMovie->title : 'Select a Movie' }}
                    </button>
                </x-slot>
                <x-dropdown-item href="{{ route('manage.quote') }}" :active="request()->routeIs('manage.quote')">
                    All
                </x-dropdown-item>
                @foreach (Movie::all() as $movie)
                    <x-dropdown-item href="{{ route('movie.quotes', $movie->id) }}" :active="isset($currentMovie) && $currentMovie->id === $movie->id">
                        {{ ucwords($movie->title) }}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
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
