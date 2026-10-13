@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1 class="page-title">{{ $icon }} {{ $title }}</h1>
        <p class="page-lead">{{ $text }}</p>

        <div class="lab-info">
            Каталог товарів буде підключено до бази даних у наступних лабораторних роботах.
        </div>
    </div>
@endsection