@extends('layouts.app')

@section('title', 'Склад принтерів')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Склад <span>принтерів</span></h1>
            <a href="{{ route('printers.create') }}" class="btn btn-orange">Додати принтер</a>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('printers.index') }}" class="filter">
            <label for="brand">Виробник:</label>
            <select id="brand" name="brand">
                <option value="">Усі виробники</option>
                @foreach ($brands as $item)
                    <option value="{{ $item }}" @selected($brand === $item)>{{ $item }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-orange btn-sm">Показати</button>
            @if ($brand)
                <a href="{{ route('printers.index') }}" class="btn btn-light btn-sm">Скинути</a>
            @endif
        </form>

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Модель</th>
                    <th>Виробник</th>
                    <th>Технологія</th>
                    <th>Ціна, грн</th>
                    <th>На складі</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($printers as $i => $printer)
                    <tr>
                        <td>{{ $printers->firstItem() + $i }}</td>
                        <td><a href="{{ route('printers.show', $printer) }}">{{ $printer->name }}</a></td>
                        <td>{{ $printer->brand }}</td>
                        <td>{{ $printer->technology->value }}</td>
                        <td>{{ number_format($printer->price, 0, ',', ' ') }}</td>
                        <td>{{ $printer->quantity }} шт.</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('printers.edit', $printer) }}" class="btn btn-light btn-sm">Редагувати</a>
                                <form method="POST" action="{{ route('printers.destroy', $printer) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Принтерів не знайдено.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $printers->links('pagination::default') }}
    </div>
@endsection