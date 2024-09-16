<x-app-layout>
    <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Post </h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <div class="py-8 text-center" x-data="{ imagePreview: '', showPreview: false }">
                            <div
                                class="max-w-4xl mx-auto text-center space-y-5 p-14 border-2 border-violet-100 border-dashed shadow-sm rounded-3xl">
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

                                <div x-show="showPreview" class="w-full text-center py-6">
                                    <img :src="imagePreview" alt="Preview"
                                        class="max-w-full mx-auto rounded-md bg-cover">
                                </div>
                                <button type="button" x-show="showPreview"
                                    @click.prevent="showPreview = false; $refs.image.value = ''"
                                    class="bg-violet-100 text-violet-800 rounded-full shadow w-12 h-12">
                                    <div>X</div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full h-96 mb-6 ">
                        <label for="featured_image" class="text-sm font-medium leading-6 text-gray-900">Featured
                            Image</label>
                        <img class="h-full w-full object-cover object-center rounded-2xl mt-2"
                            src="{{ asset('images/' . $post->featured_image) }}" alt="">
                    </div>
                    <div class="col-span-full">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <input id="title" name="title" type="text" autocomplete="title"
                            value="{{ $post->title }}"
                            class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    <div class="col-span-full">
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                        <input id="slug" name="slug" type="text" autocomplete="slug"
                            value="{{ $post->slug }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    <div class="col-span-full">
                        <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900">Excerpt</label>
                        <textarea rows="3" name="excerpt" id="excerpt"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $post->excerpt }}</textarea>
                    </div>


                    <div class="col-span-full">
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                        <textarea rows="8" name="content" id="content"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ trim($post->content) }}</textarea>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <select id="status" name="status" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option>Publish</option>
                            <option>Draft</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end gap-x-6">
                <a href="{{ URL::previous() }}" type="button"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
        </div>
    </form>

</x-app-layout>
