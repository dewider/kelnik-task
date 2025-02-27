<x-base-layout>
    <x-slot name="title">
        Статьи
    </x-slot>

    @foreach ($articles as $article)
        <div class="row border-bottom">
            <div class="col-3">
                <p>Автор: {{ $article->getAuthor() }}</b></p>
                <p>{{ $article->getCreatedAt() }}</p>
            </div>
            <div class="col-7">
                <h2 class="h4">{{ $article->getTitle() }}</h2>
                {{ $article->getPreviewText() }}
            </div>
            <div class="col-2">
                <a href="{{ route('detail', ['article' => $article->getId()]) }}">
                    Подробно
                </a>
            </div>
        </div>
    @endforeach

    <div class="row">
        {!! $pagination !!} 
    </div>
</x-base-layout>