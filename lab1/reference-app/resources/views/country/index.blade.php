@extends('layouts.app')

@section('title', 'Довідник країн')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Довідник <span>країн</span></h1>
            <a href="{{ route('country.create') }}" class="btn btn-orange">Додати країну</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Код</th>
                    <th>Назва</th>
                    <th>Населення</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $i => $country)
                    <tr>
                        <td>{{ $countries->firstItem() + $i }}</td>
                        <td>{{ $country->code }}</td>
                        <td><a href="{{ route('country.show', $country) }}">{{ $country->name }}</a></td>
                        <td>{{ number_format($country->population, 0, ',', ' ') }}</td>
                        <td><a href="{{ route('country.edit', $country) }}">Редагувати</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $countries->links('pagination::default') }}
    </div>
@endsection