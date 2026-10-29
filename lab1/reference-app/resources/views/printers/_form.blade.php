<div class="form-group">
    <label for="name">Модель *</label>
    <input id="name" name="name" type="text" value="{{ old('name', $printer->name ?? '') }}" class="@error('name') is-invalid @enderror">
    @error('name')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="brand">Виробник *</label>
    <input id="brand" name="brand" type="text" value="{{ old('brand', $printer->brand ?? '') }}" class="@error('brand') is-invalid @enderror">
    @error('brand')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="technology">Технологія друку *</label>
    <select id="technology" name="technology" class="@error('technology') is-invalid @enderror">
        <option value="">— оберіть технологію —</option>
        @foreach ($technologies as $technology)
            <option value="{{ $technology->value }}" @selected(old('technology', isset($printer) ? $printer->technology->value : '') === $technology->value)>{{ $technology->label() }}</option>
        @endforeach
    </select>
    @error('technology')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="price">Ціна, грн *</label>
    <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $printer->price ?? '') }}" class="@error('price') is-invalid @enderror">
    @error('price')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="quantity">Кількість на складі *</label>
    <input id="quantity" name="quantity" type="number" min="0" value="{{ old('quantity', $printer->quantity ?? 0) }}" class="@error('quantity') is-invalid @enderror">
    @error('quantity')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="description">Опис</label>
    <textarea id="description" name="description" class="@error('description') is-invalid @enderror">{{ old('description', $printer->description ?? '') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
</div>