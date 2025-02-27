<x-base-layout>
    <x-slot name="title">
        Добавление статьи
    </x-slot>

    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                            >{{ old($fieldName) }}</textarea>
                        @else
                            <input
                                type="text"
                                class="form-control @error( $fieldName ) is-invalid @enderror"
                                placeholder="{{ $field['title'] }}"
                                name="{{ $fieldName }}"
                                value="{{ old($fieldName) }}"
                            >
                        @endif
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</x-base-layout>