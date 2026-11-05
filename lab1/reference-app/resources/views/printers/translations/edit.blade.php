@extends('layouts.app')

@section('title', 'Переклад: ' . $printer->name)

@section('content')
    <div class="container">
        <h1 class="page-title">{{ $translation ? 'Редагування' : 'Додавання' }} <span>перекладу ({{ $language }})</span></h1>
        <p class="page-lead">{{ $printer->brand }} {{ $printer->name }}</p>

        <div class="white-box" style="max-width: 720px;">
            <form method="POST" action="{{ route('printers.translations.update', ['printer' => $printer, 'locale' => $locale]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Заголовок *</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $translation->title ?? '') }}" class="@error('title') is-invalid @enderror">
                    @error('title')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Опис</label>
                    <textarea id="description" name="description" class="@error('description') is-invalid @enderror">{{ old('description', $translation->description ?? '') }}</textarea>
                    @error('description')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-orange">Зберегти</button>
                <a href="{{ route('printers.translations.index', $printer) }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection