@extends('layouts.app')

@section('title', 'Користувачі')

@section('content')
    <div class="container">
        <div class="toolbar">
            <h1 class="page-title">Користувачі <span>системи</span></h1>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Ім’я</th>
                    <th>Зареєстровано</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $i => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at?->format('d.m.Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">Користувачів немає.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $users->links('pagination::default') }}
    </div>
@endsection