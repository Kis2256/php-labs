@extends('layouts.app')

@section('title', 'Дані прийнято')

@section('content')
    <div class="container">
        <h1 class="page-title">Дані прийнято</h1>

        <div class="white-box" style="max-width: 520px;">
            <p>Ви ввели такі дані:</p>
            <ul style="margin: 14px 0 20px 20px; line-height: 1.8;">
                <li><strong>Ім'я:</strong> {{ $name }}</li>
                <li><strong>Email:</strong> {{ $email }}</li>
            </ul>
            <a href="{{ route('entry.form') }}" class="btn btn-orange">Повернутися до форми</a>
        </div>
    </div>
@endsection