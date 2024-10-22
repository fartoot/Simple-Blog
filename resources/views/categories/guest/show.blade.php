
<x-guest-layout>
    <div class="py-5 px-10 mx-auto max-w-screen-lg space-y-10">
        <div class="space-y-8">
            <h1 class="text-5xl text-center font-bold">{{ $category->name }}</h1>
            <div class="flex justify-center">
            </div>
        </div>

        <div class="h-80">
            @if($category->featured_image)
            <img class="h-full w-full object-cover object-center rounded-2xl" src="{{ asset('images/'.$category->featured_image) }}" alt="">
            @else
                <span class="h-full w-full block rounded-2xl bg-gradient-to-r from-violet-700 to-violet-400" ></span>
            @endif
        </div>
        <p>
            {{ $category->description }}
        </p>
    @include('components.posts-grid')
    </div>

</x-guest-layout>
