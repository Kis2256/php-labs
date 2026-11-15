@extends('layouts.app')

@section('title', 'Мітки блогу')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Мітки <span>блогу</span></h1>
            <div class="actions">
                <a href="{{ route('blog.admin') }}" class="btn btn-light">До записів</a>
                <a href="{{ route('filters.create') }}" class="btn btn-orange">Додати мітку</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Назва</th>
                    <th>Опис</th>
                    <th>Записів</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($filters as $i => $filter)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $filter->filter_name }}</td>
                        <td>{{ $filter->filter_description ?: '—' }}</td>
                        <td>{{ $filter->blogs_count }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('filters.edit', $filter) }}" class="btn btn-light btn-sm">Редагувати</a>
                                <form method="POST" action="{{ route('filters.destroy', $filter) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Міток поки немає.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection