    <div class="mx-auto max-w-7xl">
        <div role="list"
            class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts as $key => $post)
                <a href="/post/{{ $post->slug }}" class="flex flex-col">
                    @if($post->featured_image)
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover hover:scale-105 hover:transition-all"
                        src="{{ asset('images/' . $post->featured_image) }}" alt="">
                    @else
                        <span class="aspect-[3/2] w-full block rounded-xl object-cover hover:scale-105 hover:transition-all bg-gradient-to-r from-violet-700 to-violet-400" ></span>
                    @endif
                <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">
                    {{ ucwords($post->title) }}
                    </h3>
                    <p class="text-base leading-7 text-gray-600 grow">{{ Str::limit($post->excerpt, 100) }}</p>
                    <div class="flex items-center justify-between  mt-3 text-gray-500">
                        <div class="flex items-center gap-3">
                            <img class="rounded-full h-7 w-7"
                                src="{{ asset('images/'.$post->user->profile) }}" />
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

