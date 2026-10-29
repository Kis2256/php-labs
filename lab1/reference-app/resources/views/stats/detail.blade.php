@extends('layouts.app')

@section('title', 'Детальна статистика')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Детальна <span>статистика</span></h1>
            <a href="{{ route('stats.pages', ['type' => $type]) }}" class="btn btn-light">Назад до зведення</a>
        </div>

        <p class="page-lead">
            Фільтр: <strong>{{ $types[$type] }}</strong> = <strong>{{ $item ?? 'усі' }}</strong>
            · знайдено записів: <strong>{{ $rows->total() }}</strong>
        </p>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Сторінка</th>
                    <th>IP</th>
                    <th>Метод</th>
                    <th>Маршрут</th>
                    <th>Пристрій</th>
                    <th>Статус</th>
                    <th>Параметри</th>
                    <th>Дата і час</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        <td>{{ $row->page }}</td>
                        <td>{{ $row->ip }}</td>
                        <td>{{ $row->method }}</td>
                        <td>{{ $row->route_name ?? '—' }}</td>
                        <td>{{ $row->device }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->meta ? json_encode($row->meta, JSON_UNESCAPED_UNICODE) : '—' }}</td>
                        <td>{{ $row->visited_at->format('d.m.Y H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Записів не знайдено.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $rows->links('pagination::default') }}
    </div>
@endsection