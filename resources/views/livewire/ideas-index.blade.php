<div>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6 pt-1">
        <div class="w-full md:w-1/3">
            <select wire:model.lazy="category" name="category" id="category"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="All Categories">All Categories</option>
                @foreach ($categories as $category)
                <option value="{{ $category->title }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model.lazy="filter" name="other_filters" id="other_filters"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                <option value="Spam Ideas">Spam Ideas</option>
                @endadmin
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input wire:model.lazy="search" type="search" placeholder="Find an idea"
                class="w-full rounded-xl bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->

    <div>
        @if (session('success_message'))
        <div x-data="{ isVisible: true }" x-init="
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                " x-show.transition.duration.1000ms="isVisible">
            <div class="p-4 my-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-white"
                role="alert">
                <span class="font-medium">{{ session('success_message') }}</span>
            </div>

        </div>
        @endif
    </div>

    <div class="ideas-container space-y-6 my-8">
        @forelse ($ideas as $idea)
        <livewire:idea-index :key="$idea->id" :idea="$idea" :votesCount="$idea->votes_count" />
        @empty
        <div class="mx-auto w-70 mt-12">
            {{-- <img src="{{ asset('img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto"
                style="mix-blend-mode: luminosity"> --}}
            <div class="text-gray-400 text-center font-bold mt-6">No ideas were found...</div>
        </div>
        @endforelse
    </div>

    <div class="my-8">
        {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>