<x-app-layout :title="$post->title">

    {{-- <div class="grid grid-cols-1 gap-4 mb-4">
        <div
            class="p-5 mr-2 md:mr-4 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
            <div class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $post->title }}
            </div>


        </div>
    </div> --}}

    <div class="grid grid-cols-1 gap-4 mb-4">
        <div class="relative w-full">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <img src="{{ $post->getFirstMediaUrl('images') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="{{ $post->title }}">
            </div>
        </div>


        {{-- <div id="controls-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ $post->getFirstMediaUrl('images') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ $post->getFirstMediaUrl('images') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>

            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div> --}}

    </div>

    <main class="py-8 lg:py-16 bg-white dark:bg-gray-800 rounded-lg">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->user->profile_photo_url }}"
                                alt="{{ $post->user->name }}">
                            <div>
                                <a href="/{{ '@' . $post->user->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $post->user->name }}
                                </a>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                    {{ '@' . $post->user->username }}
                                </p>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="{{ $post->created_at->diffForHumans() }}"
                                        title="{{ $post->created_at->diffForHumans() }}">
                                        {{ $post->created_at->diffForHumans() }}
                                    </time></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}
                    </h1>
                </header>
                <p class="lead">

                </p>
                {!! nl2br(e($post->content)) !!}

                {{-- <div class="p-4 rounded-lg bg-white dark:bg-gray-900">

                    @if (count($post->getMedia('images')) > 0)
                    @if (count($post->getMedia('images')) > 1)
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($post->getMedia('images') as $i)
                        <div>
                            <a target="_blank" href="{{ $i->getUrl() }}">
                                <img class="h-auto max-w-full rounded-lg" src="{{ $i->getUrl() }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="grid grid-cols-1">
                        @foreach ($post->getMedia('images') as $i)
                        <div>
                            <a target="_blank" href="{{ $i->getUrl() }}">
                                <img class="h-auto max-w-full rounded-lg" src="{{ $i->getUrl() }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif
                </div> --}}
            </article>
        </div>
    </main>

    @if (count($post->getMedia('images')) > 0)
    @if (count($post->getMedia('images')) > 1)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4">
        @foreach ($post->getMedia('images') as $i)
        <a target="_blank" href="{{ $i->getUrl() }}">
            <img class="h-auto max-w-full rounded-lg" src="{{ $i->getUrl() }}">
        </a>
        @endforeach
    </div>
    @else
    <div class="grid grid-cols-1 py-8">
        @foreach ($post->getMedia('images') as $i)
        <div class="flex justify-between mx-auto pt-4">
            <a target="_blank" href="{{ $i->getUrl() }}">
                <img class="h-auto max-w-full rounded-lg" src="{{ $i->getUrl() }}" alt="">
            </a>
        </div>
        @endforeach
    </div>
    @endif
    @endif


    <livewire:comments :post="$post" />


</x-app-layout>