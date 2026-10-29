@extends('layouts.app')

@section('title', 'Додати країну')

@section('content')
    <div class="container">
        <h1 class="page-title">Додати країну</h1>

        <div class="white-box" style="max-width: 560px;">
            <form method="POST" action="{{ route('country.store') }}">
                @csrf
                @include('country._form')
                <button type="submit" class="btn btn-orange">Зберегти</button>
            </form>
        </div>
    </div>
@endsection