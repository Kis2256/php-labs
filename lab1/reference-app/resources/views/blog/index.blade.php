@extends('layouts.app')

@section('title', 'Блог')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Наш <span>блог</span></h1>
            @auth
                <a href="{{ route('blog.admin') }}" class="btn btn-light">Адміністрування</a>
            @endauth
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <nav class="blog-filters">
            <a href="{{ route('blog.index') }}" @class(['active' => ! $filterId])>Усі записи</a>

            @foreach ($filters as $id => $name)
                <a href="{{ route('blog.index', ['filter' => $id]) }}" @class(['active' => (int) $filterId === $id])>{{ $name }}</a>
            @endforeach
        </nav>

        <div class="blog-grid">
            @forelse ($blogs as $blog)
                @include('blog._item', ['blog' => $blog])
            @empty
                <p>Записів із такою міткою немає.</p>
            @endforelse
        </div>

        {{ $blogs->links('pagination::default') }}
    </div>
@endsection