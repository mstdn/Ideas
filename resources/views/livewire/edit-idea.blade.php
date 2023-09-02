<div>
    <form method="POST" wire:submit.prevent="updateIdea">
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title" wire:model.live="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="A title">
                <div>
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select wire:model.live="category" id="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    {{-- <option selected="">Select category</option> --}}
                    @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ?
                        'selected' : '' }}>{{
                        ucwords($category->title) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" rows="4" wire:model.live="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write your post here"></textarea>

                <div>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="images">
                    Upload images (optional)
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    wire:model="images" name="images" id="images" type="file" multiple>


                <div wire:loading wire:target="images" class="sm:col-span-2">
                    <div
                        class="w-full px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">
                        Uploading...</div>
                </div>
                <div>@error('images')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">Oops!</span> {{ $message }}</p>@enderror</div>
            </div> --}}
            {{-- <div class="sm:col-span-2">
                @if ($images)
                @if (count($images) < 11) @if (count($images)> 1)
                    <div class="grid gap-4 grid-cols-2">
                        @foreach ($images as $image)
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ $image->temporaryUrl() }}"
                                alt="">
                        </div>
                        @endforeach
                    </div>
                    @else
                    @foreach ($images as $image)
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ $image->temporaryUrl() }}"
                            alt="">
                    </div>
                    @endforeach
                    @endif
                    @endif
                    @endif
            </div> --}}
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Edit
        </button>
    </form>
</div>






{{-- <div
    x-cloak
    x-data="{ isOpen: false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @custom-show-edit-modal.window="
        isOpen = true
        $nextTick(() => $refs.title.focus())
    "
    x-init="
        Livewire.on('ideaWasUpdated', () => {
            isOpen = false
        })
    "
    class="fixed z-10 inset-0 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
>
    <div class="flex items-end justify-center min-h-screen">
        <div
            x-show.transition.opacity="isOpen"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            aria-hidden="true">
        </div>

        <div
            x-show.transition.origin.bottom.duration.300ms="isOpen"
            class="modal bg-white rounded-tl-xl rounded-tr-xl overflow-hidden transform transition-all py-4 sm:max-w-lg sm:w-full"
        >
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button
                    @click="isOpen = false"
                    class="text-gray-400 hover:text-gray-500"
                >
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-center text-lg font-medium text-gray-900">Edit Idea</h3>
                <p class="text-xs text-center leading-5 text-gray-500 px-6 mt-4">You have one hour to edit your idea from the time you created it.</p>

                <form wire:submit.prevent="updateIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input wire:model.defer="title" x-ref="title" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your Idea" required>
                        @error('title')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <select wire:model.defer="category" name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div>
                        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Describe your idea" required></textarea>
                        @error('description')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        <button
                                type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                            <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>
                        <button
                                type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                            <span class="ml-1">Update</span>
                        </button>
                    </div>
                </form>
            </div>

        </div> 
    </div>
</div> --}}
