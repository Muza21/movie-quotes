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
    <section>
            <div class="max-w-2xl mx-auto mt-16">
                <h1 class="text-left text-white underline text-4xl">
                    <a href="#">{{ __('texts.movie_title') }}</a>
                </h1>
            </div>
        <div class="mt-28">
            <div class="bg-white max-w-3xl mx-auto rounded-xl mt-20 overflow-hidden">
                <div>
                    <img src="/images/truth.jpg" class="max-w-full max-h-full" alt="">
                </div>

                <div class="max-w-2xl mx-auto rounded-xl text-center p-4">
                    <q class="text-neutral-700 text-4xl">{{ __('texts.movie_quote') }}</q>
                </div>
            </div>
            <div class="bg-white max-w-3xl mx-auto rounded-xl mt-20 overflow-hidden">
                <div>
                    <img src="/images/truth.jpg" class="max-w-full max-h-full" alt="">
                </div>

                <div class="max-w-2xl mx-auto rounded-xl text-center p-4">
                    <q class="text-neutral-700 text-4xl">{{ __('texts.movie_quote') }}</q>
                </div>
            </div>
        </div>
        
    </section>
</body>
</html>