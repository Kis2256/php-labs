@extends('layouts.app')

@section('title', 'Популярні принтери')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Популярні <span>принтери</span></h1>
            <a href="{{ route('stats.pages') }}" class="btn btn-light">Загальна статистика</a>
        </div>

        <h2 class="section-title" style="margin-top: 10px;">Найчастіше переглядані <span>моделі</span></h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Принтер</th>
                    <th>Переглядів</th>
                    <th>Унікальних IP</th>
                    <th>Останній перегляд</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($views as $i => $view)
                    @php($printer = $printers->get($view->printer_id))
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            @if ($printer)
                                <a href="{{ route('printers.show', $printer) }}">{{ $printer->brand }} {{ $printer->name }}</a>
                            @else
                                Видалений принтер #{{ $view->printer_id }}
                            @endif
                        </td>
                        <td>{{ $view->hits }}</td>
                        <td>{{ $view->visitors }}</td>
                        <td>{{ $view->last_visit }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Переглядів принтерів ще немає.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h2 class="section-title">Використання фільтра <span>за виробником</span></h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Виробник</th>
                    <th>Кількість використань фільтра</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $row)
                    <tr>
                        <td><a href="{{ route('printers.index', ['brand' => $row->brand]) }}">{{ $row->brand }}</a></td>
                        <td>{{ $row->hits }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Фільтр ще не використовувався.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection