<div>
    <form method="POST" wire:submit.prevent="save">
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title" wire:model.live="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="A title">
                <div>
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- <div>
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                <input type="text" name="brand" id="brand"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Product brand" required="">
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="number" name="price" id="price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$2999" required="">
            </div> --}}
            <div>
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select wire:model.live="category" id="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    {{-- <option selected="">Select category</option> --}}
                    @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{
                        ucwords($category->title) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="contents"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="contents" rows="4" wire:model.live="content"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write your post here"></textarea>

                <div>
                    @error('content') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="images">
                    Upload images (optional)
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    wire:model="images" name="images" id="images" type="file" multiple>


                <div wire:loading wire:target="images"
                    class="sm:col-span-2">
                    <div
                        class="w-full px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">
                        Uploading...</div>
                </div>


                {{-- <div wire:loading wire:target="images">Uploading...</div> --}}
                <div>@error('images')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">Oops!</span> {{ $message }}</p>@enderror</div>
            </div>
            <div class="sm:col-span-2">
                @if ($images)
                @if (count($images) < 11) @if (count($images)> 1)
                    <div class="grid gap-4 grid-cols-2">
                        @foreach ($images as $image)
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ $image->temporaryUrl() }}" alt="">
                        </div>
                        @endforeach
                    </div>
                    @else
                    @foreach ($images as $image)
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ $image->temporaryUrl() }}" alt="">
                    </div>
                    @endforeach
                    @endif
                    {{-- <img src="{{ $image->temporaryUrl() }}" alt=""> --}}
                    @endif
                    @endif
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Publish
        </button>
    </form>
</div>