<div class="bg-white pt-5 sm:pt-5 w-full">
    <div class="max-w-7xl px-6 lg:px-8 flex justify-center">
        <div role="list" class="mt-20 flex flex-wrap gap-4">
            @foreach ($tags as $key => $tag)
                <a href="/tag/{{ $tag->slug}}" class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                    <p class="text-lg font-black mx-auto my-auto text-violet-700 uppercase">#{{ $tag->name }}</p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="pt-14 pb-5 mx-auto">
        {{ $tags->links('pagination::simple-tailwind') }}
    </div>

</div>
