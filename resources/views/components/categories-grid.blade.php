<div class="bg-white pt-5 sm:pt-5">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div role="list"
            class="mx-auto mt-20 grid max-w-2xl grid-cols-2 gap-x-8 gap-y-16 sm:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            @foreach ($categories as $key => $category)
                <div class="relative">
                    <a href="/category/{{ $category->slug }}" class="flex flex-col hover:scale-105 hover:transition-all">
                        <img class="aspect-[3/3] w-full rounded-full object-cover  brightness-50"
                            src="{{ asset('images/' . $category->featured_image) }}" alt="">
                        <!-- <span class="absolute bottom-2 left-3 bg-white/50 text-sm py-1 px-2 rounded-full text-gray-800">{{ ucwords($category->name) }}</span> -->
                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <p class="text-2xl text-white font-bold text-center">{{ ucwords($category->name) }}</p>
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pt-14 pb-5 mx-auto">
        {{ $categories->links('pagination::simple-tailwind') }}
    </div>

</div>
