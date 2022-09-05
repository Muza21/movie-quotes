<x-navigation>
    <div class="w-full max-w-4xl mx-auto my-20 bg-white shadow-lg rounded-xl border border-gray-200">
        <header class="px-9 py-4 border-b border-gray-100 text-center font-bold text-lg">
            <h2>{{ __('texts.manage_movies') }}</h2>
        </header>
        <div class="overflow-x-auto p-3">
            <table class="table-auto w-full">
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($movies as $movie)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <div class="font-medium text-gray-800 underline">
                                    <p class="text-lg">
                                        {{ $movie->title }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="text-left text-green-500">
                                    <a href="{{ route('movie.quotes', $movie->id) }}"
                                        class="hover:text-green-600">{{ __('texts.view') }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="text-left font-medium text-orange-400">
                                    <a href="{{ route('edit.movie', $movie->id) }}"
                                        class="hover:text-orange-600">{{ __('texts.edit') }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-center">
                                    <form method="POST" action="{{ route('delete.movie', $movie->id) }}">
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
</x-navigation>
