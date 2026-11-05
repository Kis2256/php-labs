@extends('layouts.app')

@section('title', 'Форма введення даних')

@section('content')
    <div class="container">
        <h1 class="page-title">Форма введення даних</h1>

        <div class="white-box" style="max-width: 520px;">
            <form method="POST" action="{{ route('entry.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Ім'я</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-orange">Надіслати</button>
            </form>
        </div>
    </div>
@endsection