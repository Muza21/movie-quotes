@props('post')

<div class="bg-white max-w-3xl mx-auto rounded-xl mt-20 overflow-hidden">
    <div>
        <img src="/images/truth.jpg" class="max-w-full max-h-full" alt="">
    </div>

    <div class="max-w-2xl mx-auto rounded-xl text-center p-4">
        <q class="text-neutral-700 text-4xl">{{ $post->title }}</q>
    </div>
</div>