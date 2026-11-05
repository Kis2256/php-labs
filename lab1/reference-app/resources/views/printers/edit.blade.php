@extends('layouts.app')

@section('title', 'Редагування принтера')

@section('content')
    <div class="container">
        <h1 class="page-title">Редагування: <span>{{ $printer->brand }} {{ $printer->name }}</span></h1>

        <div class="white-box" style="max-width: 640px;">
            <form method="POST" action="{{ route('printers.update', $printer) }}">
                @csrf
                @method('PUT')
                @include('printers._form')
                <button type="submit" class="btn btn-orange">Зберегти зміни</button>
                <a href="{{ route('printers.show', $printer) }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection