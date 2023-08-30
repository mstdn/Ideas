<div x-data @click="
                    const clicked = $event.target
                    const target = clicked.tagName.toLowerCase()
                    const ignores = ['button', 'svg', 'path', 'a']
                    if (! ignores.includes(target)) {
                        clicked.closest('.idea-container').querySelector('.idea-link').click()
                    }
                    "
    class="idea-container hover:shadow-card transition duration-150 ease-in bg-white dark:bg-gray-800 rounded-xl flex cursor-pointer border border-gray-200 dark:border-gray-700">
    <div class="hidden md:block border-r border-gray-200 dark:border-gray-700 px-5 py-8">
        <div class="text-center text-gray-500 dark:text-white">
            <div class="font-semibold text-2xl @if ($hasVoted) text-blue @endif">{{ $votesCount }}</div>
            <div>Votes</div>
        </div>

        <div class="mt-8">
            @if ($hasVoted)
            <button wire:click.prevent="vote"
                {{-- class="w-20 bg-blue text-white border border-blue hover:bg-blue-hover font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3" --}}
                class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                >
                Voted</button>
            @else
            <button wire:click.prevent="vote"
                {{-- class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3" --}}
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                >
                Vote
            </button>
            @endif
        </div>
    </div>
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <div class="flex-none mx-2 md:mx-0">
            <a href="#">
                <img src="{{ $idea->user->profile_photo_url }}" alt="{{ $idea->user->name }}"
                    class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
            <h4 class="text-xl font-semibold mt-2 md:mt-0 dark:text-white">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title
                    }}</a>
            </h4>
            <div class="text-gray-600 dark:text-gray-100 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>

            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->title }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900 dark:text-gray-200">3 Comments</div>
                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-4 md:mt-0">

                    
                    <div
                        class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                        {{ $idea->status->name }}</div>
                </div>

                <div class="flex items-center md:hidden mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none">{{ $votesCount }}</div>
                        <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                    </div>
                    @if ($hasVoted)
                    <button wire:click.prevent="vote"
                        class="w-20 bg-blue text-white border border-blue font-bold text-xxs uppercase rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-4 py-3 -mx-5">
                        Voted
                    </button>
                    @else
                    <button wire:click.prevent="vote"
                        class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5">
                        Vote
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>