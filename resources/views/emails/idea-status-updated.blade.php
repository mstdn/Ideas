{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}

@component('mail::message')
# Idea Status Updated

The idea: {{ $idea->title }}

has been updated to a status of:

{{ $idea->status->name }}

@component('mail::button', ['url' => route('idea.show', $idea)])
View Idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent