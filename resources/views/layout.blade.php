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
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <h1>Home</h1>
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth

                <button class="text-xs font-bold uppercase mr-4">Welcome, {{ auth()->user()->username }}</button>
                
                <form method="POST" action="/logout">
                    @csrf
                        <button href="#" type="submit" 
                            class="bg-blue-300 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                        >Log Out
                        </button>
                </form>

                
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
            @endauth
            
        </div>
    </nav>
    
    </div>
    <section>
        <div class="max-w-3xl mx-auto rounded-xl mt-32 overflow-hidden">
            <img src="/images/truth.jpg" class="max-w-full max-h-full" alt="">
        </div>
        <div class="max-w-2xl mx-auto rounded-xl text-center mt-14">
            <q class="text-white text-4xl">{{ __('texts.movie_quote') }}</q>
        </div>
        <div class="max-w-2xl mx-auto rounded-xl mt-16">
                <h1 class="text-center text-white underline text-4xl">
                    <a href="#">{{ __('texts.movie_title') }}</a>
                </h1>
        </div>
    </section>
    <div class="fixed">
        <div>
            <p class="p-2 w-10 text-center rounded-full bg-white"><a href="{{ route('locale.change', 'en') }}">en</a></p>
        </div>
        <div>
            <p class="p-2 w-10 text-center rounded-full bg-white"><a href="{{ route('locale.change','ka') }}">ka</a></p>
        </div>
    </div>
    @if (session()->has('success'))
        <div x-data={show:true}
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
</html>