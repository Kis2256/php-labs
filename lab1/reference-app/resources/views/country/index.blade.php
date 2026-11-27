@extends('layouts.app')

@section('title', 'Довідник країн')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Довідник <span>країн</span></h1>
            @auth
                <a href="{{ route('country.create') }}" class="btn btn-orange">Додати країну</a>
            @endauth
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Код</th>
                    <th>Назва</th>
                    <th>Населення</th>
                    @auth
                        <th>Дії</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $i => $country)
                    <tr>
                        <td>{{ $countries->firstItem() + $i }}</td>
                        <td>{{ $country->code }}</td>
                        <td><a href="{{ route('country.show', $country) }}">{{ $country->name }}</a></td>
                        <td>{{ number_format($country->population, 0, ',', ' ') }}</td>
                        @auth
                            <td><a href="{{ route('country.edit', $country) }}">Редагувати</a></td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $countries->links('pagination::default') }}
    </div>
@endsection