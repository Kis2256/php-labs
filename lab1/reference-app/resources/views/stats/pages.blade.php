@extends('layouts.app')

@section('title', 'Статистика відвідувань')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Статистика <span>відвідувань</span></h1>
            <a href="{{ route('stats.printers') }}" class="btn btn-orange">Популярні принтери</a>
        </div>

        <div class="filter">
            <span>Групувати за:</span>
            @foreach ($types as $key => $label)
                <a href="{{ route('stats.pages', ['type' => $key]) }}" class="btn btn-sm {{ $type === $key ? 'btn-orange' : 'btn-light' }}">{{ $label }}</a>
            @endforeach
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>{{ $types[$type] }}</th>
                    <th>Звернень</th>
                    <th>Унікальних IP</th>
                    <th>Останній візит</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        <td>
                            <a href="{{ route('stats.detail', ['type' => $type, 'item' => $row->{$type}]) }}">
                                {{ $row->{$type} ?? '—' }}
                            </a>
                        </td>
                        <td>{{ $row->hits }}</td>
                        <td>{{ $row->visitors }}</td>
                        <td>{{ $row->last_visit }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Даних ще немає.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection