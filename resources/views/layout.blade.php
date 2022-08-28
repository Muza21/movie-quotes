<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Quotes</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-700">
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
    <div>
        <div>
            <p class="p-2 w-10 text-center rounded-full bg-white"><a href="/change-locale/en">en</a></p>
        </div>
        <div>
            <p class="p-2 w-10 text-center rounded-full bg-white"><a href="/change-locale/ka">ka</a></p>
        </div>
    </div>
</body>
</html>