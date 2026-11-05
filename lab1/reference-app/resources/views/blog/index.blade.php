@extends('layouts.app')

@section('title', 'Блог')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Наш <span>блог</span></h1>
            <a href="{{ route('blog.admin') }}" class="btn btn-light">Адміністрування</a>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="blog-grid">
            @forelse ($blogs as $blog)
                @include('blog._item', ['blog' => $blog])
            @empty
                <p>Записів поки немає.</p>
            @endforelse
        </div>

        {{ $blogs->links('pagination::default') }}
    </div>
@endsection