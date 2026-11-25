@extends('layouts.app')

@section('title', 'Особистий кабінет')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Особистий <span>кабінет</span></h1>
            <a href="{{ route('blog.create') }}" class="btn btn-orange">Додати запис</a>
        </div>

        <div class="card" style="margin-bottom: 24px;">
            <h3>{{ $user->name }}</h3>
            <p>
                Електронна пошта: {{ $user->email }}<br>
                Зареєстровано: {{ $user->created_at?->format('d.m.Y') }}<br>
                Моїх записів у блозі: {{ $posts->total() }}
            </p>
            <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">Редагувати профіль</a>
        </div>

        <h2 style="margin-bottom: 12px;">Мої записи</h2>

        <table class="data-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Заголовок</th>
                    <th>Категорія</th>
                    <th>Мітки</th>
                    <th>Дата</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $i => $post)
                    <tr>
                        <td>{{ $posts->firstItem() + $i }}</td>
                        <td><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->category?->category_name ?? '—' }}</td>
                        <td>
                            @forelse ($post->filters as $filter)
                                <span class="tag">{{ $filter->filter_name }}</span>
                            @empty
                                —
                            @endforelse
                        </td>
                        <td>{{ $post->dt_created->format('d.m.Y') }}</td>
                        <td><a href="{{ route('blog.edit', $post) }}" class="btn btn-light btn-sm">Редагувати</a></td>
                    </tr>
                @empty
                    <tr><td colspan="6">Ви ще не створили жодного запису.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $posts->links('pagination::default') }}
    </div>
@endsection