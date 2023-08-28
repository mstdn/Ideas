<x-app-layout :title="'Categories'">

    @include('partials.search')

    <div class="grid grid-cols-1 gap-4 mb-4">
        @foreach ($categories as $category)
        <div
            class="p-5 mb-4 border border-gray-100 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="text-lg font-semibold text-gray-900 dark:text-white">
               <a href="{{ $category->full_url }}">{{ $category->title }}</a> 
            </div>
            <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                @foreach ($category->posts as $post)
                    @include('partials.postcard', ['post' => $post])
                @endforeach
                
            </ol>
        </div>
        @endforeach

    </div>
</x-app-layout>