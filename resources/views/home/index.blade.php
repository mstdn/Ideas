<x-app-layout :title="'Home'">

    <section class="bg-white dark:bg-gray-800 dark:border-gray-700 border border-gray-200 rounded-lg">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Welcome to dis thing
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                Cats say meow meow all day, everyday.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                @guest
                <a href="{{ route('register') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Signup now
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="{{ route('login') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Login
                </a>
                @endguest
                @auth
                <a href="{{ route('categories.index') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Browse categories
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="/{{ '@' . Auth::user()->username }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    See profile
                </a>
                @endauth
            </div>
        </div>
    </section>

    @if ($post)
    <section class="bg-gray-50 dark:bg-gray-900">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full rounded-xl" src="{{ $post->getFirstMediaUrl('images') }}" alt="{{ $post->title }}">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    {{ $post->title }}
                </h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">
                    {{ Str::limit($post->content, 200) }}
                </p>
                <a href="{{ $post->full_url }}"
                    class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('Read more') }}
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

    <aside aria-label="Most articles" class="py-4 bg-gray-50 dark:bg-gray-900 rounded-lg">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Recent articles</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($recent->take(4) as $i)
                <article class="max-w-full">
                    <a href="{{ $i->full_url }}">
                        <img src="{{ $i->getFirstMediaUrl('images') }}"
                            class="mb-5 rounded-lg object-cover w-full h-64" alt="Image 1">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="{{ $i->full_url }}">{{ $i->title }}</a>
                    </h2>
                    <p class="mb-6 font-light text-gray-500 dark:text-gray-400">
                        {{ Str::limit($i->content, 60) }}
                    </p>
                    <a href="{{ $i->full_url }}"
                        class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-blue-700 border-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                    </a>
                </article>
                @endforeach
                
            </div>
        </div>
    </aside>

    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

    <div class="grid grid-cols-1 gap-4 my-4">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Browse All
            </h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                Posts per category.
            </p>
        </div>
        @foreach ($categories as $category)
        <div class="p-5 mb-4 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="text-lg font-semibold text-gray-900 dark:text-white">
                <a href="/categories/{{ $category->slug }}">{{ $category->title }}</a>
            </div>
            <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                @foreach ($category->posts->take(10) as $post)
                @include('partials.postcard', ['post' => $post])
                @endforeach

            </ol>
        </div>
        @endforeach
    </div>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Most recent
                </h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Read the most recent posts.
                </p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                @foreach ($recent->take(6) as $p)
                @include('partials.article', ['post' => $p])
                @endforeach
            </div>
        </div>
    </section>


</x-app-layout>