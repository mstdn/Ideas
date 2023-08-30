<x-app-layout :title="'API'">
    <section class="bg-white dark:bg-gray-900">
        <div class="pb-8 mx-auto">
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">

                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">How to quickly deploy
                    a static website</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Static websites are now used to
                    bootstrap lots of websites and are becoming the basis for a variety of tools that even influence
                    both web designers and developers.</p>
            </div>

        </div>
    </section>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>