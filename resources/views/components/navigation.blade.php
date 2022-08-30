<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Quotes</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-neutral-700">
    @auth
    <nav class="md:flex md:justify-between md:items-center mt-6">
        <div class="text-white uppercase font-semibold text-lg  hover:text-green-500">
            <a href="/">
                <h1 class="mx-10 hover:text-green-500">Welcome, {{ auth()->user()->username }}</h1>
            </a>
        </div>

        <div class=" md:mt-0 flex items-center">
            <div class="text-lg text-white font-bold uppercase mr-10  hover:text-green-500">
                <a href="{{ route('admin.manage') }}">Manage Movies</a>
            </div>
            <div class="text-lg text-white font-bold uppercase mr-10  hover:text-green-500">
                <a href="{{ route('admin.create') }}">Create Movie Quote</a>
            </div>
            
            <form method="POST" action="/logout">
                @csrf
                    <button href="#" type="submit" 
                        class="text-white uppercase font-semibold text-lg mr-10 rounded-xl hover:text-green-500"
                    >Log Out
                    </button>
            </form>
        </div>
        
    </nav>
    @else
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.index') }}" class="text-white mr-10 uppercase font-semibold text-lg rounded-xl hover:text-green-500">Log In</a>
        </div>        
    @endauth

    {{ $slot }}

    
    <div class="fixed top-[45%] ml-5">
        <div class="border-solid border-2 border-white bg-white rounded-full">
            <a href="{{ route('locale.change', 'en') }}">
                <x-active-item :active="request()->is(route('locale.change', 'en'))">
                    en
                </x-active-item>
            </a>
        </div> 
        {{-- <div class="border-solid border-2 border-white bg-white rounded-full">
            <a href="{{ route('locale.change', 'en') }}">
                <p class="p-2 w-10 text-center rounded-full text-black">
                en
                </p>
            </a>
        </div> --}}
        <div class="border-solid border-2 border-white bg-white rounded-full mt-2">
            <a href="{{ route('locale.change', 'ka') }}">
                <x-active-item :active="request()->is(route('locale.change', 'ka'))">
                    ka
                </x-active-item>
            </a>
        </div> 
    </div>
    @if (session()->has('success'))
        <div x-data={show:true}
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
</html>