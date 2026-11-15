
<div class="form-group">
    <label for="materials">Сумісні матеріали</label>
    <select id="materials" name="materials[]" multiple>
        @foreach ($materials as $technology => $items)
            <optgroup label="{{ $technology === 'FDM' ? 'FDM (філамент)' : 'SLA (смола)' }}">
                @foreach ($items as $material)
                    <option value="{{ $material->id }}" @selected(in_array($material->id, old('materials', $selected ?? [])))>{{ $material->name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('materials')
        <p class="error">{{ $message }}</p>
    @enderror
    @error('materials.*')
        <p class="error">{{ $message }}</p>
    @enderror
</div>