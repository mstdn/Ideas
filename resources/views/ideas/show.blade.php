<x-app-layout :title="$idea->title">
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 5H1m0 0 4 4M1 5l4-4"/>
            </svg>
            <span class="ml-2 dark:text-white">All ideas</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    <x-modals-container :idea="$idea" />

    <x-notification-success />

    <livewire:idea-comments :idea="$idea" />

    {{-- @can('update', $idea)
    <livewire:edit-idea :idea="$idea" />
    @endcan --}}

    {{-- @can('delete', $idea)
        <livewire:delete-idea :idea="$idea" />
    @endcan

    @auth
        <livewire:mark-idea-as-spam :idea="$idea" />
    @endauth

    @admin
        <livewire:mark-idea-as-not-spam :idea="$idea" />
    @endadmin --}}


</x-app-layout>
