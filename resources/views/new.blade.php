<x-base-layout>
    <x-slot name="title">
        Добавление статьи
    </x-slot>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('new') }}">
                @csrf

                <div class="form-group mb-2">
                    <input type="text" class="form-control" placeholder="Заголовок*" require>
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" placeholder="Автор">
                </div>
                <div class="form-group mb-2">
                    <textarea class="form-control" name="" id="" placeholder="Бриф*" require></textarea>
                </div>
                <div class="form-group mb-2">
                    <textarea class="form-control" name="" id="" placeholder="Текст статьи"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</x-base-layout>