<x-app-layout>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Post Creation
                </h2>

                <div class="py-8 text-center" x-data="{ imagePreview: '', showPreview: false }">
                    <div
                        class="max-w-4xl mx-auto text-center p-14 border-2 border-violet-100 border-dashed shadow-sm rounded-3xl">
                        <div class="flex items-center justify-center bg-grey-lighter">
                            <label
                                class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-full shadow-md  uppercase cursor-pointer hover:bg-blue hover:text-violet-400 text-violet-600">
                                <svg class="w-8 h-8" fill="#4F46E5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input type="file" id="image" name="image" class="mx-auto hidden"
                                    x-on:change="showPreview = true; imagePreview = URL.createObjectURL($event.target.files[0])">
                            </label>
                        </div>

                        <div x-show="showPreview" class="w-full text-center my-6">
                            <img :src="imagePreview" alt="Preview" class="max-w-full mx-auto h-auto rounded-md"">
                        </div>
                        <button x-show="showPreview" @click.prevent="showPreview = false; $refs.image.value = ''"
                            class="bg-violet-100 text-violet-800 rounded-full shadow w-12 h-12">
                            <div>X</div>
                        </button>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input id="title" name="title" type="text" autocomplete="title"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea rows="8" name="content" id="content"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                    <div class="col-span-full grid grid-cols-2 gap-x-10">
                        <div>
                            <p class="block text-sm font-medium leading-6 text-gray-900">Categories</p>
                            <div id="categories" class="mt-2">
                                    <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" name="category" id="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div>
                            <p class="block text-sm font-medium leading-6 text-gray-900">Tags</p>
                            <div id="tags"
                                class="overflow-y-auto h-32 p-1  border rounded-md mt-2 border-gray-300 grid md:grid-cols-2 2xl:grid-cols-3">
                                @foreach ($tags as $tag)
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="tag{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-violet-600 focus:ring-violet-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="tag{{ $tag->id }}"
                                                class="font-medium text-gray-900">{{ $tag->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-2">
                            <select id="status" name="status"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option>Publish</option>
                                <option>Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- post status --}}


            <div class="flex items-center justify-end gap-x-6">
                <a href="{{ URL::previous() }}" type="button"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>


</x-app-layout>
