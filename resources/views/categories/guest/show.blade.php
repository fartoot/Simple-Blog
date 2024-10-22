
<x-guest-layout>
    <div class="py-5 px-10 mx-auto max-w-screen-lg space-y-10">
        <div class="space-y-8">
            <h1 class="text-5xl text-center font-bold">{{ $category->name }}</h1>
            <div class="flex justify-center">
            </div>
        </div>
        
        <div class="h-80">
            <img class="h-full w-full object-cover object-center rounded-2xl" src="{{ asset('images/'.$category->featured_image) }}" alt="">
        </div>
        <p>
            {{ $category->description }}
        </p>
    @include('components.posts-grid')
    </div>
    
</x-guest-layout>