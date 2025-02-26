<x-base-layout>
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>

    {{ $article->detail_text }}
</x-base-layout>