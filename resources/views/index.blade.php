<x-base-layout>
    <x-slot name="title">
        Статьи
    </x-slot>

    @foreach ($articles as $article)
        <div class="row border-bottom">
            <div class="col-3">
                <p>Автор: {{ $article->author }}</b></p>
                <p>{{ $article->created_at }}</p>
            </div>
            <div class="col-7">
                <h2 class="h4">{{ $article->title }}</h2>
                {{ $article->preview_text }}
            </div>
            <div class="col-2">
                <a href="{{ route('detail', ['article' => $article->id]) }}">
                    Подробно
                </a>
            </div>
        </div>
    @endforeach

    <div class="row">
        {{ $articles->links() }}
    </div>
</x-base-layout>