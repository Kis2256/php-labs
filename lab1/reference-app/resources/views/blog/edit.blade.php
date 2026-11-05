@extends('layouts.app')

@section('title', 'Редагування запису')

@section('content')
    <div class="container">
        <h1 class="page-title">Редагування <span>запису</span></h1>

        <div class="white-box" style="max-width: 720px;">
            <form method="POST" action="{{ route('blog.update', $blog) }}">
                @csrf
                @method('PUT')
                @include('blog._form')
                <button type="submit" class="btn btn-orange">Зберегти зміни</button>
                <a href="{{ route('blog.admin') }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection