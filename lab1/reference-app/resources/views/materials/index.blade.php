@extends('layouts.app')

@section('title', 'Матеріали')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Витратні <span>матеріали</span></h1>
            <a href="{{ route('printers.index') }}" class="btn btn-light">До принтерів</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Матеріал</th>
                    <th>Технологія</th>
                    <th>Опис</th>
                    <th>Сумісних принтерів</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materials as $i => $material)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $material->name }}</td>
                        <td>{{ $material->technology }}</td>
                        <td>{{ $material->description ?: '—' }}</td>
                        <td>{{ $material->printers_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Матеріалів поки немає.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection