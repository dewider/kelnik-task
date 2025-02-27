<x-base-layout>
    <x-slot name="title">
        Добавление статьи
    </x-slot>

    <div class="row">
        <div class="col-12">
            <form
                action="{{ route('new-save') }}"
                method="post"
            >
                @csrf

                @foreach ($fields as $fieldName => $field)
                    <div class="form-group mb-2">
                        @if ($field['type'] == 'text')
                            <textarea
                                class="form-control @error( $fieldName ) is-invalid @enderror"
                                name="{{ $fieldName }}"
                                placeholder="{{ $field['title'] }}"
                            ></textarea>
                        @else
                            <input
                                type="text"
                                class="form-control @error( $fieldName ) is-invalid @enderror"
                                placeholder="{{ $field['title'] }}"
                                name="{{ $fieldName }}"
                            >
                        @endif
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</x-base-layout>