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
            <img class="h-full w-full object-cover object-center rounded-2xl" src="{{ asset('images/'.$post->featured_image) }}" alt="">
        </div>
        <p>
            {{ $post->content }}
        </p>
        
        <div class="mt-2 space-x-2 flex">
            @foreach ($post->tags as $key => $tag)
                <a href="/tag/{{ $tag->slug }}" class="bg-gray-100 px-2 text-base">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</x-guest-layout>