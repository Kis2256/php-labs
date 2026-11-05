@extends('layouts.app')

@section('title', 'Новий запис блогу')

@section('content')
    <div class="container">
        <h1 class="page-title">Новий <span>запис</span></h1>

        <div class="white-box" style="max-width: 720px;">
            <form method="POST" action="{{ route('blog.store') }}">
                @csrf
                @include('blog._form')
                <button type="submit" class="btn btn-orange">Зберегти</button>
                <a href="{{ route('blog.admin') }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection