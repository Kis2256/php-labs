@extends('layouts.app')

@section('title', 'Редагування країни')

@section('content')
    <div class="container">
        <h1 class="page-title">Редагування країни</h1>

        <div class="white-box" style="max-width: 560px;">
            <form method="POST" action="{{ route('country.update', $country) }}">
                @csrf
                @method('PUT')
                @include('country._form')
                <button type="submit" class="btn btn-orange">Зберегти зміни</button>
            </form>
        </div>
    </div>
@endsection