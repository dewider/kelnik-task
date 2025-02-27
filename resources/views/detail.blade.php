<x-base-layout>
    <x-slot name="title">
        {{ $article->getTitle() }}
    </x-slot>

    {{ $article->getDetailText() }}
</x-base-layout>