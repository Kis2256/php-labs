@extends('layouts.app')

@section('title', $printer->brand . ' ' . $printer->name)

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <h1 class="page-title">{{ $printer->brand }} <span>{{ $printer->name }}</span></h1>

        <div class="white-box details" style="max-width: 720px;">
            <p><strong>Виробник:</strong> {{ $printer->brand }}</p>
            <p><strong>Технологія:</strong> {{ $printer->technology->label() }}</p>
            <p><strong>Ціна:</strong> {{ number_format($printer->price, 2, ',', ' ') }} грн</p>
            <p><strong>На складі:</strong> {{ $printer->quantity }} шт.</p>
            <p><strong>Опис:</strong> {{ $printer->description ?: '—' }}</p>
            <p><strong>Додано:</strong> {{ $printer->created_at->format('d.m.Y H:i') }}</p>

            <div class="actions">
                <a href="{{ route('printers.edit', $printer) }}" class="btn btn-orange btn-sm">Редагувати</a>
                <form method="POST" action="{{ route('printers.destroy', $printer) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                </form>
                <a href="{{ route('printers.index') }}" class="btn btn-light btn-sm">Повернутися до списку</a>
            </div>
        </div>
    </div>
@endsection