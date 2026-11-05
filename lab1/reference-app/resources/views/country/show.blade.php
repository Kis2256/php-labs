@extends('layouts.app')

@section('title', $country->name)

@section('content')
    <div class="container">
        <h1 class="page-title">{{ $country->name }}</h1>

        <div class="white-box details" style="max-width: 560px;">
            <p><strong>Код:</strong> {{ $country->code }}</p>
            <p><strong>Населення:</strong> {{ number_format($country->population, 0, ',', ' ') }}</p>

            <div class="actions">
                <a href="{{ route('country.edit', $country) }}" class="btn btn-orange btn-sm">Редагувати</a>
                <form method="POST" action="{{ route('country.destroy', $country) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                </form>
                <a href="{{ route('country.index') }}" class="btn btn-light btn-sm">Повернутися до списку</a>
            </div>
        </div>
    </div>
@endsection