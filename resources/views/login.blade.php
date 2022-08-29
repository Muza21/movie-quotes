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
        <main class="max-w-lg mx-auto mt-32 bg-slate-100 p-6 rounded-xl">

            <h1 class="text-center font-bold text-2xl">Log In!</h1>

            <form method="POST" action="/admin/login" class="mt-10">
                @csrf
        
                <div class="mb-5">
                    <label for="email">Email</label>
                
                    <input
                        class="border border-gray-400 p-2 w-full rounded-xl"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old("email") }}"
                        required
                    >
                
                    @error("email")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="password">Password</label>
                
                    <input
                        class="border border-gray-400 p-2 w-full rounded-xl"
                        type="password"
                        name="password"
                        id="password"
                        required
                    >
                
                    @error("password")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
        
                <button type="submit" 
                        class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-6 rounded-xl hover:bg-green-600">
                        Log In
                </button>

            </form>

        </main>
    </section>
</body>
</html>