<div class="form-group">
    <label for="filter_name">Назва мітки *</label>
    <input id="filter_name" name="filter_name" type="text" value="{{ old('filter_name', $filter->filter_name ?? '') }}" class="@error('filter_name') is-invalid @enderror">
    @error('filter_name')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="filter_description">Опис</label>
    <textarea id="filter_description" name="filter_description" class="@error('filter_description') is-invalid @enderror">{{ old('filter_description', $filter->filter_description ?? '') }}</textarea>
    @error('filter_description')
        <p class="error">{{ $message }}</p>
    @enderror
</div>