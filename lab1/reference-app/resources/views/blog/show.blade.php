@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <h1 class="page-title">{{ $blog->title }}</h1>

        <p class="blog-meta">
            <span class="blog-category">{{ $blog->category?->category_name ?? 'Без категорії' }}</span>
            · Автор: {{ $blog->author?->name ?? 'Редакція' }}
            · {{ $blog->dt_created->format('d.m.Y H:i') }}
        </p>

        <div class="white-box details" style="max-width: 820px;">
            @if ($blog->description)
                <p><strong>{{ $blog->description }}</strong></p>
            @endif
            <p>{!! nl2br(e($blog->text ?? '')) !!}</p>

            <div class="actions">
                <a href="{{ route('blog.edit', $blog) }}" class="btn btn-orange btn-sm">Редагувати</a>
                <a href="{{ route('blog.index') }}" class="btn btn-light btn-sm">До блогу</a>
            </div>
        </div>
    </div>
@endsection

