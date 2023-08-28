<x-app-layout :title="'Publish'">
    <section class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="py-4 px-4 mx-auto max-w-screen-xl rounded-lg">
            <div class="text-lg font-semibold text-gray-900 dark:text-white">
                Publish
            </div>
            <div class="grid grid-cols-1 gap-4 pt-4">

                <livewire:create-idea />

            </div>
        </div>
    </section>
</x-app-layout>