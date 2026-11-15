@extends('layouts.app')

@section('title', 'Склад принтерів')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Склад <span>принтерів</span></h1>
            <div class="actions">
                <a href="{{ route('materials.index') }}" class="btn btn-light">Матеріали</a>
                <a href="{{ route('printers.create') }}" class="btn btn-orange">Додати принтер</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('printers.index') }}" class="filter">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Модель, виробник або матеріал">

            <select name="brand">
                <option value="">Усі виробники</option>
                @foreach ($brands as $item)
                    <option value="{{ $item }}" @selected(request('brand') === $item)>{{ $item }}</option>
                @endforeach
            </select>

            <select name="technology">
                <option value="">Усі технології</option>
                @foreach (\App\Enums\TechnologyEnum::cases() as $case)
                    <option value="{{ $case->value }}" @selected(request('technology') === $case->value)>{{ $case->value }}</option>
                @endforeach
            </select>

            <select name="material_id">
                <option value="">Усі матеріали</option>
                @foreach ($materials as $id => $name)
                    <option value="{{ $id }}" @selected(request('material_id') == $id)>{{ $name }}</option>
                @endforeach
            </select>

            <input type="hidden" name="sort" value="{{ request('sort') }}">
            <button type="submit" class="btn btn-orange btn-sm">Застосувати</button>
            <a href="{{ route('printers.index') }}" class="btn btn-light btn-sm">Скинути</a>
        </form>

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@include('partials.sort-link', ['route' => 'printers.index', 'field' => 'name', 'label' => 'Модель'])</th>
                    <th>Виробник</th>
                    <th>Технологія</th>
                    <th>@include('partials.sort-link', ['route' => 'printers.index', 'field' => 'price', 'label' => 'Ціна, грн'])</th>
                    <th>@include('partials.sort-link', ['route' => 'printers.index', 'field' => 'quantity', 'label' => 'На складі'])</th>
                    <th>Матеріали</th>
                    <th>@include('partials.sort-link', ['route' => 'printers.index', 'field' => 'materials', 'label' => 'К-сть матеріалів'])</th>
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
                            @forelse ($printer->materials as $material)
                                <span class="tag">{{ $material->name }}</span>
                            @empty
                                —
                            @endforelse
                        </td>
                        <td>{{ $printer->materials_count }}</td>
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
                    <tr><td colspan="9">Принтерів не знайдено.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $printers->links('pagination::default') }}
    </div>
@endsection