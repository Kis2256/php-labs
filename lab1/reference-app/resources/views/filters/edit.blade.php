@extends('layouts.app')

@section('title', 'Редагування мітки')

@section('content')
    <div class="container">
        <h1 class="page-title">Редагування <span>мітки</span></h1>

        <div class="white-box" style="max-width: 720px;">
            <form method="POST" action="{{ route('filters.update', $filter) }}">
                @csrf
                @method('PUT')
                @include('filters._form')
                <button type="submit" class="btn btn-orange">Зберегти зміни</button>
                <a href="{{ route('filters.index') }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection