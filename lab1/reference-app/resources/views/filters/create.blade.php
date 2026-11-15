@extends('layouts.app')

@section('title', 'Нова мітка')

@section('content')
    <div class="container">
        <h1 class="page-title">Нова <span>мітка</span></h1>

        <div class="white-box" style="max-width: 720px;">
            <form method="POST" action="{{ route('filters.store') }}">
                @csrf
                @include('filters._form')
                <button type="submit" class="btn btn-orange">Зберегти</button>
                <a href="{{ route('filters.index') }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection