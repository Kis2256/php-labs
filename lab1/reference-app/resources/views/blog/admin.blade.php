@extends('layouts.app')

@section('title', 'Адміністрування блогу')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Адміністрування <span>блогу</span></h1>
            <a href="{{ route('blog.create') }}" class="btn btn-orange">Додати запис</a>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Заголовок</th>
                    <th>Категорія</th>
                    <th>Дата</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $i => $blog)
                    <tr>
                        <td>{{ $blogs->firstItem() + $i }}</td>
                        <td><a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a></td>
                        <td>{{ $blog->category?->category_name ?? '—' }}</td>
                        <td>{{ $blog->dt_created->format('d.m.Y') }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('blog.edit', $blog) }}" class="btn btn-light btn-sm">Редагувати</a>
                                <form method="POST" action="{{ route('blog.destroy', $blog) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Записів немає.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $blogs->links('pagination::default') }}
    </div>
@endsection