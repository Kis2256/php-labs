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

        <form method="GET" action="{{ route('blog.admin') }}" class="filter">
            <input type="text" name="title" value="{{ request('title') }}" placeholder="Заголовок">
            <input type="text" name="categoryName" value="{{ request('categoryName') }}" placeholder="Назва категорії">

            <select name="category_id">
                <option value="">Усі категорії</option>
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" @selected(request('category_id') == $id)>{{ $name }}</option>
                @endforeach
            </select>

            <select name="filter_id">
                <option value="">Усі мітки</option>
                @foreach ($filters as $id => $name)
                    <option value="{{ $id }}" @selected(request('filter_id') == $id)>{{ $name }}</option>
                @endforeach
            </select>

            <input type="hidden" name="sort" value="{{ request('sort') }}">
            <button type="submit" class="btn btn-orange btn-sm">Застосувати</button>
            <a href="{{ route('blog.admin') }}" class="btn btn-light btn-sm">Скинути фільтри</a>
        </form>

        <table class="data-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>@include('partials.sort-link', ['route' => 'blog.admin', 'field' => 'title', 'label' => 'Заголовок'])</th>
                    <th>@include('partials.sort-link', ['route' => 'blog.admin', 'field' => 'categoryName', 'label' => 'Категорія'])</th>
                    <th>Мітки</th>
                    <th>@include('partials.sort-link', ['route' => 'blog.admin', 'field' => 'created', 'label' => 'Дата'])</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $i => $blog)
                    <tr>
                        <td>{{ $blogs->firstItem() + $i }}</td>
                        <td><a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a></td>
                        <td>{{ $blog->category?->category_name ?? '—' }}</td>
                        <td>
                            @forelse ($blog->filters as $filter)
                                <span class="tag">{{ $filter->filter_name }}</span>
                            @empty
                                —
                            @endforelse
                        </td>
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
                    <tr><td colspan="6">Записів не знайдено.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $blogs->links('pagination::default') }}
    </div>
@endsection