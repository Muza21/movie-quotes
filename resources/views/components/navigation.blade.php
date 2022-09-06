<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Quotes</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-neutral-700">
    @auth
        <nav class="flex justify-between items-center mt-6">
            <div class="text-white uppercase font-semibold text-lg">

                <h2 class="mx-10 hover:text-green-500">
                    <a href="{{ route('random.quote') }}">{{ __('texts.random_quote') }}</a>
                </h2>

            </div>

            <div class=" md:mt-0 flex items-center">
                <div class="text-lg text-white font-bold uppercase mr-10  hover:text-green-500">
                    <x-active href="{{ route('movies.index') }}" :active="request()->routeIs('movies.index')">
                        {{ __('texts.manage_movies') }}
                    </x-active>
                </div>
                <div class="text-lg text-white font-bold uppercase mr-10  hover:text-green-500">
                    <x-active href="{{ route('quotes.index') }}" :active="request()->routeIs('quotes.index')">
                        {{ __('texts.manage_quotes') }}
                    </x-active>
                </div>
                <div class="text-lg text-white font-bold uppercase mr-10  hover:text-green-500">
                    <x-active href="{{ route('movies.create') }}" :active="request()->routeIs('movies.create')">
                        {{ __('texts.add_movies') }}
                    </x-active>
                </div>
                <div class="text-lg text-white font-bold uppercase mr-10  hover:text-green-500">
                    <x-active href="{{ route('quotes.create') }}" :active="request()->routeIs('quotes.create')">
                        {{ __('texts.add_quotes') }}
                    </x-active>
                </div>


                <form method="POST" action="/logout">
                    @csrf
                    <button href="#" type="submit"
                        class="text-white uppercase font-semibold text-lg mr-10 rounded-xl hover:text-green-500">{{ __('texts.log_out') }}
                    </button>
                </form>
            </div>

        </nav>
    @else
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.index') }}"
                class="text-white mr-10 uppercase font-semibold text-lg rounded-xl hover:text-green-500">{{ __('texts.log_in') }}</a>
        </div>
    @endauth

    {{ $slot }}


    <div class="fixed top-[45%] ml-5">
        <div>
            <x-active-item href="{{ route('locale.change', 'en') }}" :active="'en' === App::currentLocale()">
                en
            </x-active-item>
        </div>

        <div class="mt-8">
            <x-active-item href="{{ route('locale.change', 'ka') }}" :active="'ka' === App::currentLocale()">
                ka
            </x-active-item>
        </div>
    </div>
</body>
<x-flash />

</html>
