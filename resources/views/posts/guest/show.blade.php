<x-guest-layout>
    <div class="py-5 px-10 mx-auto max-w-screen-lg space-y-10">
        <div class="space-y-8">
            <h1 class="text-5xl text-center font-bold">{{ $post->title }}</h1>
            <div class="flex justify-center">
                <div class="text-center">
                    <img class="rounded-full h-10 w-10 mx-auto" src="https://gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" />
                    <p class="text-center">Mario Sanchez</p>
                    <p class="text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        
        <div class="h-80">
            <img class="h-full w-full object-cover object-center rounded-2xl" src="https://picsum.photos/1000/1000" alt="">
        </div>
        <p>
            {{ $post->content }}
        </p>
    </div>
</x-guest-layout>