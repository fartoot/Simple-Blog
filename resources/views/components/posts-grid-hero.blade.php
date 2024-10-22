<div class="bg-white pt-5 sm:pt-5">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div role="list"
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            @foreach ($posts->take(2) as $key => $post)
                <a href="/post/{{ $post->slug }}">
                    @if ($post->featured_image)
                        <img class="aspect-[3/2] w-full rounded-xl object-cover hover:scale-105 hover:transition-all"
                            src="{{ asset('images/'.$post->featured_image) }}" alt="">
                    @else
                        <span class="aspect-[3/2] w-full block rounded-xl object-cover hover:scale-105 hover:transition-all bg-gradient-to-r from-violet-700 to-violet-400" ></span>
                    @endif
                    <h2 class="mt-6 text-2xl font-bold leading-8 tracking-tight text-gray-900">
                        {{ Str::upper($post->title) }}</h2>
                    <div class="flex items-center mt-6 text-gray-500 ">
                        <div class="flex items-center gap-3">
                            <img class="rounded-full h-7 w-7"
                                src="https://gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" />
                            <p>{{ $post->user->name }}</p>
                        </div>
                        <span class="text-2xl  mx-4 text-gray-200 dark:text-gray-400">•</span>
                        <div>{{ $post->created_at->diffForHumans() }}</div>
                    </div>

                </a>
            @endforeach
        </div>

        <div role="list"
            class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts->slice(2) as $key => $post)
                <a href="/post/{{ $post->slug }}" class="flex flex-col">
                    @if($post->featured_image)
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover hover:scale-105 hover:transition-all"
                            src="{{ asset('images/'.$post->featured_image) }}" alt="">
                    @else
                        <span class="aspect-[3/2] w-full block rounded-xl object-cover hover:scale-105 hover:transition-all bg-gradient-to-r from-violet-700 to-violet-400" ></span>
                    @endif
                <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">{{ ucwords($post->title) }}
                    </h3>
                    <p class="text-base leading-7 text-gray-600 grow">{{ Str::limit($post->excerpt, 100) }}</p>
                    <div class="flex items-center justify-between  mt-3 text-gray-500">
                        <div class="flex items-center gap-3">
                            <img class="rounded-full h-7 w-7"
                            src="https://gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" />
                            <p>{{ $post->user->name }}</p>
                        </div>
                        <div>{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                    </a>
            @endforeach
        </div>
    </div>
    <div class="pt-14 pb-5 mx-auto">
        {{ $posts->links('pagination::simple-tailwind') }}
    </div>

</div>
