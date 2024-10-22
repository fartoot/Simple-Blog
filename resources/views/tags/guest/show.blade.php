
<x-guest-layout>
    <div class="py-5 px-10 mx-auto max-w-screen-lg space-y-10">
        <div class="space-y-8">
            <h1 class="text-5xl text-center font-bold">#{{ $tag->name }}</h1>
        </div>
        <p>
            {{ $tag->description }}
        </p>
    @include('components.posts-grid')
    </div>
    
</x-guest-layout>