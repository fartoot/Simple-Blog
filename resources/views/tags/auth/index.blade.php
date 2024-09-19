<x-app-layout>
    {{-- <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>link/link/link</p>
        
        </div>
    </div> --}}

    <div class="bg-white">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Tag</h3>
        <div class="mt-2 max-w-xl text-sm text-gray-500 mb-5">
            <p>A list of all the tags in your account including their name, slug,
                description.</p>
        </div>
        <form method="post" action="{{ route('tags.store') }}" enctype="multipart/form-data" >
            @csrf
            <div x-data="{ slug: '' }" class="sm:flex sm:items-center gap-4">
            <div class="mt-3 sm:mt-0 w-full sm:max-w-xs">
                <label for="name" class="sr-only">Name</label>
                <input x-model="slug" type="text" name="name" id="name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="health">
            </div>
            <div class="mt-3 sm:mt-0 w-full sm:max-w-xs">
                <label for="slug" class="sr-only">Slug</label>
                <input x-bind:value="slug" type="text" name="slug" id="slug"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="health">
            </div>
            <button type="submit"
                class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-0 sm:w-auto">Add tag</button>
            </div>
        </form>
    </div>

    <div class="-mx-4 mt-8 sm:-mx-0">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col"
                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 lg:table-cell sm:pl-0">
                        Name</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Slug</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">published
                        at</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">updated
                        at</th>
                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Delete</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($tags as $tag)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            {{ $tag->name }}</td>
                        <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            {{ $tag->slug }}</td>
                        <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                            {{ $tag->created_at }}</td>
                        <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            {{ $tag->updated_at }}</td>
                        <td
                            class="whitespace-nowrap flex justify-center
                                 py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-0">
                            <form method="POST" action="{{ route('tags.destroy', $tag) }}">
                                @method('DELETE')
                                @csrf
                                <button class="text-indigo-600 px-2 hover:text-indigo-600" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="ml-2 mt-0 w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links('pagination::tailwind') }}
    </div>
</x-app-layout>
