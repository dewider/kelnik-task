<x-base-layout>
    <x-slot name="title">
        {{ $article->getTitle() }}
    </x-slot>

    <div class="row">
        <div class="col-3">
            Автор: {{ $article->getAuthor() }}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $article->getDetailText() }}
        </div>
    </div>
</x-base-layout>