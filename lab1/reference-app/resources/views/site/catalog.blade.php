@extends('layouts.app')

@section('title', $category->title())

@section('content')
    <div class="container">
        <h1 class="page-title">{{ $category->icon() }} {{ $category->title() }}</h1>
        <p class="page-lead">{{ $category->description() }}</p>

        <div class="lab-info">
            Каталог товарів буде підключено до бази даних у наступних лабораторних роботах.
        </div>

        <p style="margin-top: 30px;">
            <a href="{{ route('print.form') }}" class="btn btn-orange">Замовити 3D-друк</a>
        </p>
    </div>
@endsection