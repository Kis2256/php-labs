@extends('layouts.app')

@section('title', 'Керування мітками')

@section('content')
    <div class="container">
        <h1 class="page-title">Мітки: <span>{{ $blog->title }}</span></h1>

        <div class="white-box" style="max-width: 820px;">
            <form method="POST" action="{{ route('blog.tags.store', $blog) }}">
                @csrf

                <div class="form-group">
                    <label for="duallist">Оберіть мітки запису</label>
                    <select id="duallist" name="filters[]" multiple>
                        @foreach ($filters as $id => $name)
                            <option value="{{ $id }}" @selected(in_array($id, old('filters', $selected)))>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('filters')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    @error('filters.*')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-orange">Зберегти мітки</button>
                <a href="{{ route('blog.show', $blog) }}" class="btn btn-light">Скасувати</a>
            </form>
        </div>
    </div>
@endsection