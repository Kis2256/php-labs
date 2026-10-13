@extends('layouts.app')

@section('title', 'Заявку прийнято')

@section('content')
    <div class="container">
        <div class="white-box confirm">
            <div class="confirm-icon">✓</div>
            <h1 class="page-title">Дякуємо, {{ $name }}!</h1>
            <p class="page-lead" style="margin: 0 auto;">Вашу заявку прийнято. Менеджер зв'яжеться з вами найближчим часом.</p>

            <table>
                <tr><td>Ім'я</td><td>{{ $name }}</td></tr>
                <tr><td>Email</td><td>{{ $email }}</td></tr>
                <tr><td>Тема</td><td>{{ $topic }}</td></tr>
                <tr><td>Повідомлення</td><td>{{ $message }}</td></tr>
            </table>

            <a href="{{ route('print.form') }}" class="btn btn-orange">Повернутися до сторінки</a>
            <a href="{{ route('home') }}" class="btn" style="border: 2px solid var(--orange); color: var(--orange); margin-left: 10px;">На головну</a>
        </div>
    </div>
@endsection