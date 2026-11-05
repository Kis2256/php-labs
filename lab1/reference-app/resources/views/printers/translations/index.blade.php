@extends('layouts.app')

@section('title', 'Переклади: ' . $printer->name)

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Переклади <span>{{ $printer->brand }} {{ $printer->name }}</span></h1>
            <a href="{{ route('printers.show', $printer) }}" class="btn btn-light">До принтера</a>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>Мова</th>
                    <th>Код</th>
                    <th>Заголовок</th>
                    <th>Опис</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locales as $code => $language)
                    @php($translation = $translations->get($code))
                    <tr>
                        <td>{{ $language }}@if ($code === config('locales.default')) (основна)@endif</td>
                        <td>{{ $code }}</td>
                        <td>{{ $translation?->title ?? '— перекладу немає —' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($translation?->description ?? '', 60) ?: '—' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('printers.translations.edit', ['printer' => $printer, 'locale' => $code]) }}" class="btn btn-orange btn-sm">{{ $translation ? 'Редагувати' : 'Додати' }}</a>
                                @if ($translation && $code !== config('locales.default'))
                                    <form method="POST" action="{{ route('printers.translations.destroy', ['printer' => $printer, 'locale' => $code]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection