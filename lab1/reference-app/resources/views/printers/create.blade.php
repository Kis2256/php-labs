@extends('layouts.app')

@section('title', 'Додати принтер')

@section('content')
    <div class="container">
        <h1 class="page-title">Додати <span>принтер</span></h1>

        <div class="white-box" style="max-width: 640px;">
            <form method="POST" action="{{ route('printers.store') }}">
                @csrf
                @include('printers._form')
                <button type="submit" class="btn btn-orange">Зберегти</button>
                <a href="{{ route('printers.index') }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection